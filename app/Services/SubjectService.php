<?php

namespace App\Services;


use App\Http\Requests\AddTeacherRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectService{

    public function showById(int $id){
        return Subject::find($id);
    }

    public function showAll(){
        return Subject::all();
    }

    public function naniNoAPI($day){
            $subjects = Subject::with('subjectToUserRel','schedRel')->where('groupID', auth()->user()->getAuthIdentifier())->get();
            return $this->nani($subjects,$day);
    }

    public function naniAPI(int $groupID,$day){
        if(isset($day) && is_string($day)) {
            $subjects = Subject::with('subjectToUserRel', 'schedRel')->where('groupID', $groupID)->get();
            return $this->nani($subjects, $day);
        }
        return response()->json(['error' =>'You haven`t specified the day']);
    }

    private function nani($subjects,$day){
        $schedS = array();
        foreach($subjects as $subject){
            foreach ($subject->schedRel as $sched){
                if(($sched->subject_id == $subject->id) && (isset(Auth::user()->name)) && ($sched->day == $day)){
                    $schedS[] = array('time'=> $sched->time,'subject'=>$subject->name_sub,'teacher'=>$subject->name_teacher,'class'=>$sched->classroom);
                }elseif (($sched->subject_id == $subject->id) && ($sched->day == $day)){
                    $schedS[] = array('time'=> $sched->time,'subject'=>$subject->name_sub,'teacher'=>$subject->name_teacher,'class'=>$sched->classroom);
                }
            }
        }
        //dd($schedS);
        return $schedS;
    }

    public function addTeacher(AddTeacherRequest $req){
        $sub = new Subject;
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->groupID=$req->groupID;
        $sub->semester=$req->semester;
        $sub->save();
    }

    public function updateTeacher($req, $id)
    {
        $sub = Subject::find($id);
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->groupID=$req->groupID;
        $sub->semester=$req->semester;
        $sub->save();
    }

    public function deleteTeacher(int $id)
    {
        $sub = Subject::find($id);
        $sub->delete();
    }
}
