<?php

namespace App\Http\Controllers;

use App\Models\PhGeoLocations;
use Illuminate\Http\Request;

class PhGeoLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
     * Display the specified resource.
     */
    public function show(PhGeoLocations $phGeoLocations)
    {
        return PhGeoLocations::all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhGeoLocations $phGeoLocations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhGeoLocations $phGeoLocations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhGeoLocations $phGeoLocations)
    {
        //
    }
}
