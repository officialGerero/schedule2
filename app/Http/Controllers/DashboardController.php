<?php

namespace App\Http\Controllers;

use App\Services\NoNameService;
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

    public function lol(){
        return view('dashboard')->with('schedule', $this->subjectService->naniNoAPI());
    }

    public function lolAPI(int $groupID){
        return response()->json([$this->subjectService->naniAPI($groupID)],200);
    }


}
