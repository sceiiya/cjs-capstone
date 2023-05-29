<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataModel;
class ViewController extends Controller
{
    public function docu(DataModel $mData){
        $mParam['title'] = 'First Read';
        $mParam['data'] = $mData->methodba();
        return view('layouts.dashvv', $mParam);
    }
}
