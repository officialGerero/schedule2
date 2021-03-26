<?php

namespace App\Services;


use App\Http\Requests\AddTeacherRequest;
use App\Models\Subject;

const DAYS = ["Понеділок","Вівторок","Середа","Четвер","П'ятниця"];

class SubjectService{



    public function showById(int $id){
        return Subject::find($id);
    }

    public function showAll(){
        return Subject::IdAsc()->paginate(10);
    }

    public function getSubjects(){
        $subjects = auth()->user()->getSchedules()->groupBy('day');
        return $this->sortSubjects($subjects);
    }

    public function getSubjectsAPI(int $groupID){
                return response()->json(['error' =>'You haven`t specified the day']);
    }

    private function sortSubjects($subjects): array
    {
        $schedS = array();
        foreach($subjects as $day => $value) {
            $sched = array();
            foreach ($value as $subject) {
                $subj = $subject->subject()->get();
                $sched[] = ['time' => $subject['time'], 'subject' => $subj[0]->name_sub, 'teacher' => $subj[0]->name_teacher, 'class' => $subject['classroom']];
            }
            array_multisort(array_column($sched,'time'),SORT_NATURAL, $sched);
            $schedS[$day] = $sched;
        }
        $days = array_flip(DAYS);
        uksort($schedS,
            function($a, $b) use ($days) { return $days[$a] - $days[$b]; });


        return $schedS;
    }


    public function addSubject(AddTeacherRequest $req){
        $sub = new Subject;
        $this->saveSubject($sub,$req);
    }

    public function saveSubject(Subject $sub, $req){
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->groupID=$req->groupID;
        $sub->semester=$req->semester;
        $sub->save();
    }

    public function updateSubject($req, $id)
    {
        $sub = Subject::find($id);
        $this->saveSubject($sub,$req);
    }

    public function deleteSubject(int $id)
    {
        $sub = Subject::find($id);
        $sub->delete();
    }
}
