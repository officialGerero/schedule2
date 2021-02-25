<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherRequest;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use \App\Models\Subject;

class AdminPageController extends Controller
{
    //
    private $subjectService;


    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    function addTeacher(AddTeacherRequest $req)
    {
        $this->subjectService->addTeacher($req);

    }
}
