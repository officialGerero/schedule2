<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Subject;
use \App\Models\Schedule;

class DashboardController extends Controller
{
    public function lol(){
        //$subjects = Subject::all();
        $subjects = Subject::with('subjectToUserRel','schedRel')->where('groupID', auth()->user()->getAuthIdentifier())->get();
        return view('dashboard')->with('subjects', $subjects);
    }
}
