<?php

namespace App\Services;


use App\Http\Requests\AddTeacherRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectService{

    public function naniNoAPI(){
        $subjects = Subject::with('subjectToUserRel','schedRel')->where('groupID', auth()->user()->getAuthIdentifier())->get();
        return $this->nani($subjects);
    }

    public function naniAPI(int $groupID){
        $subjects = Subject::with('subjectToUserRel','schedRel')->where('groupID', $groupID)->get();
        return $this->nani($subjects);

    }

    private function nani($subjects){
        $schedS = array();
        foreach($subjects as $subject){
            foreach ($subject->schedRel as $sched){
                if(($sched->subject_id == $subject->id) && (isset(Auth::user()->name))){
                    $schedS[] = $subject->name_sub. " | ". Auth::user()->name." | ". $sched->day ." | ". $sched->time ;
                }elseif ($sched->subject_id == $subject->id){
                    $schedS[] = $subject->name_sub. " | name | ". $sched->day ." | ". $sched->time ;
                }
            }
        }
        return $schedS;
    }

    public function addTeacher(AddTeacherRequest $req){
        $sub = new Subject;
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->groupID=$req->groupID;
        echo $sub->save();
    }
}
