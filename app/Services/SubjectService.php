<?php

namespace App\Services;

use App\Models\Subject;


class SubjectService{



    public function showById(int $id){
        return Subject::find($id);
    }

    public function showAllSubjects(){
        return Subject::IdAsc()->paginate(10);
    }
    public function getAllSubjectsForUser(int $id){
        return Subject::where('group_id',$id)->get();
    }

    public function addSubject($req){
        $sub = new Subject;
        $this->saveSubject($sub,$req);
    }

    public function saveSubject(Subject $sub, $req){
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->group_id=$req->group_id;
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
