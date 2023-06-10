<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PointSystemController extends Controller
{

    public function index()
    {
        return view('test.points');
    }
    public function show($employeeID)
    {
        $employeeID = decrypt($employeeID);
        // return Session::get('user');
        $title = auth()->user()->first_name.'\'s Points';
        $usercreds = Session::get('user');
        $mypoints = PointsModel::where('employee_id', $employeeID)->first();
        return view('employee.mypoints', compact('mypoints', 'usercreds', 'title'));
        // return $mypoints;
    }
    public function increment($employeeID, $in_add)
    {
        $employeeID = decrypt($employeeID);
        $in_add = decrypt($in_add);
        // dd($employeeID);
        $em_point = PointsModel::where('employee_id', $employeeID);
        if($em_point->increment('total_points', $in_add) && $em_point->increment('unused_points', $in_add)){
            return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->with('success', 'Task Points Added!');
        }else{
            return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->withErrors('Failed to adding points');
        }
    }

    public function convert($employeeID)
    {   
        $employeeID = decrypt($employeeID);
        $em_point = PointsModel::where('employee_id', $employeeID)->first();

        try {
            if($em_point->unused_points < 500){
                return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->withErrors('You dont have enough points to convert, must be atleast 500!');
            }elseif( $em_point->converted_at == null){
                return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->withErrors('First conversion can be done after 15 days!');
            }elseif( $em_point->converted_at !== null){
                $convertedAt = $em_point->converted_at;
                $lastConverted = Carbon::parse($convertedAt);
                $rule = Carbon::now()->subDays(15);
            }else{
                return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->withErrors('You can only convert points every 15 days!');
            }

            if ($lastConverted <= $rule) {
                // return 'can convert';
                if( $em_point->increment('converted_points', $em_point->unused_points) &&
                    $em_point->decrement('unused_points', $em_point->unused_points) &&
                    $em_point->update(['converted_at' => date("Y-m-d H:i:s")])
                ){
                    return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->with('success', 'converted successfully');
                }else{
                    return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->withErrors('something went wrong');
                }
            } else {
                return redirect()->route('show-points', ['employeeID' => encrypt($employeeID)])->withErrors("Action denied! Last converted: {$lastConverted->diffForHumans()}. You can only convert points every 15 days. Next convertible: {$lastConverted->diffInDays($rule)}");
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
