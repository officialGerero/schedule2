<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function lol(){
        $subjects = \App\Models\Subject::all();
        return view('dashboard', compact('subjects'));
    }
}
