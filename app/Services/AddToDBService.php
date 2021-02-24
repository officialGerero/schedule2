<?php

namespace App\Services;


use App\Http\Requests\AddTeacherRequest;
use App\Models\Subject;

class AddToDBService{

    public function addTeacher(AddTeacherRequest $req){
        $sub = new Subject;
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->groupID=$req->groupID;
        echo $sub->save();
    }
}
