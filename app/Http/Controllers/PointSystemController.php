<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PointSystemController extends Controller
{

    public function index()
    {
        return view('test.points');
    }
    public function show($employeeID)
    {
        $employeeID = decrypt($employeeID);
        PointsModel::where('employee_id', $employeeID);
    }
    public function increment($employeeID, $in_add)
    {
        $employeeID = decrypt($employeeID);
        $in_add = decrypt($in_add);
        // dd($employeeID);
        $em_point = PointsModel::where('employee_id', $employeeID);
        if($em_point->increment('total_points', $in_add) && $em_point->increment('unused_points', $in_add)){
            return 'sucks 2 be alive';
        }else{
            return 'fuck';
        }
    }

    public function convert($employeeID)
    {   
        $employeeID = decrypt($employeeID);
        $em_point = PointsModel::where('employee_id', $employeeID)->first();

        try {
            if($em_point->unused_points <= 500){
                return 'You dont have enough points to convert, must be atleast 500!';
            }elseif( $em_point->converted_at !== null){
                $convertedAt = $em_point->converted_at;
                $lastConverted = Carbon::parse($convertedAt);
                $rule = Carbon::now()->subDays(15);
            }else{
                return 'You can only convert points every 15 days!';
            }

            if ($lastConverted <= $rule) {
                return 'can convert';
            }else{
                return 'cannot convert! Last converted: '.$lastConverted;
            }

            if($em_point->increment('converted_points', $em_point->unused_points) &&
                $em_point->decrement('unused_points', $em_point->unused_points) &&
                $em_point->update(['converted_at' => date("Y-m-d H:i:s")])
                ){
                return 'converted successfully';
            }else{
                return 'something went wrong';
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PointsModel $pointsModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PointsModel $pointsModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PointsModel $pointsModel)
    {
        //
    }
}
