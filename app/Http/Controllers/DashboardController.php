<?php

namespace App\Http\Controllers;

use App\Services\SubjectService;
use Illuminate\Http\Request;
use \App\Models\Subject;
use \App\Models\Schedule;

class DashboardController extends Controller
{
    private $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    public function getSubjects(){
        return view('dashboard')->with('days', $this->subjectService->getSubjects());
    }

    public function getSubjectsAPI(int $groupID){
        return response()->json([$this->subjectService->getSubjectsAPI($groupID)],200);
    }


}
