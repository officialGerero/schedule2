<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Subject;
use \App\Models\Schedule;

class DashboardController extends Controller
{

    public function lol(){
        $schedS = array();


        $subjects = Subject::with('subjectToUserRel','schedRel')->where('groupID', auth()->user()->getAuthIdentifier())->get();
        foreach($subjects as $subject){
            foreach($subject->subjectToUserRel as $user) {
                $user_name = $user->name;
            }
            foreach ($subject->schedRel as $sched){
                if($sched->subject_id == $subject->id){
                    $schedS[] = $subject->name_sub. " | ". $user_name." | ". $sched->day ." | ". $sched->time ;
                }
            }
        }
        return view('dashboard')->with('schedule', $schedS);
    }
}
