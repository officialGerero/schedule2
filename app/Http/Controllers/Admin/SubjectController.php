<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSubjectRequest;
use App\Http\Requests\EditSubjectRequest;
use App\Services\SubjectService;
use Illuminate\Http\Request;

class SubjectController extends Controller{
    private $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService=$subjectService;
    }

    public function getSubject(int $id){
        return view('addsubject')->with('what',$this->subjectService->showById($id));
    }

    public function addSubject(AddSubjectRequest $req)
    {
        $this->subjectService->addSubject($req);
        return redirect()->route('subjects')->with('success','Teacher was added successfully');
    }

    public function updateSubject(EditSubjectRequest $req, int $id)
    {
        $this->subjectService->updateSubject($req, $id);
        return redirect()->route('subjects')->with('success','Teacher was updated successfully');
    }

    public function deleteSubject(int $id){
        $this->subjectService->deleteSubject($id);
        return redirect()->route('subjects')->with('success','Teacher was deleted successfully');
    }

}

