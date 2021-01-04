<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Subject;

class DashboardController extends Controller
{
    public function lol(){
        //$subjects = Subject::all();
        $subjects = Subject::with('subjectToUserRel')->where('groupID', auth()->user()->getAuthIdentifier())->get();
        return view('dashboard')->with('subjects', $subjects);
    }
}
