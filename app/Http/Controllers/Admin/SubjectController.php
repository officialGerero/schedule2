<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTeacherRequest;
use App\Http\Requests\EditTeacherRequest;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller{
    private $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService=$subjectService;
    }

    public function getTeacher(int $id){
        return view('addsubject')->with('what',$this->subjectService->showById($id));
    }

    public function addTeacher(AddTeacherRequest $req)
    {
        $this->subjectService->addTeacher($req);
        return redirect()->route('subjects')->with('success','Teacher was added successfully');
    }

    public function updateTeacher(EditTeacherRequest $req, int $id)
    {
        $this->subjectService->updateTeacher($req, $id);
        return redirect()->route('subjects')->with('success','Teacher was updated successfully');
    }

    public function deleteTeacher(int $id){
        $this->subjectService->deleteTeacher($id);
        return redirect()->route('subjects')->with('success','Teacher was deleted successfully');
    }

}

