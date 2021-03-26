<?php

namespace App\Http\Controllers;

use App\Services\ScheduleService;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use \App\Models\Subject;
use \App\Models\Schedule;

class DashboardController extends Controller
{
    private $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService = $scheduleService;
    }

    public function getSchedules(){
        return view('dashboard')->with('days', $this->scheduleService->getSchedules());
    }

    public function getSubjectsAPI(int $groupID){
        return response()->json([$this->scheduleService->getSchedulesAPI()],200);
    }


}
