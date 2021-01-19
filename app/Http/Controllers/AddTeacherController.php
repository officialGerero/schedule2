<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Subject;

class AddTeacherController extends Controller
{
    //
    function addTeacher(Request $req){
        $sub = new Subject;
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->groupID=$req->groupID;
        echo $sub->save();

    }
}
