<?php

namespace App\Http\Controllers;


use App\Http\Requests\SearchSchedulesRequest;
use App\Services\ScheduleService;
use App\Services\SubjectService;
use App\Services\UserService;
use Illuminate\Http\Request;

class ListsPageController extends Controller
{
    private $subjectService;

    private $userService;

    private $scheduleService;

    public function __construct(SubjectService $subjectService, UserService $userService, ScheduleService $scheduleService)
    {
        $this->subjectService = $subjectService;
        $this->userService = $userService;
        $this->scheduleService = $scheduleService;
    }

    public function users()
    {
        return view('usersList')->with('items',$this->userService->showUsers());
    }

    public function subjects()
    {
        return view('subjects')->with('items', $this->subjectService->showAllSubjects());
    }

    public function schedules(int $id)
    {
        return view('schedules')->with('items', $this->scheduleService->showSchedules($id));
    }

    public function allSchedules()
    {
        return view('allschedules')->with([
            'items' => $this->scheduleService->showAllSchedules(),
            ]);
    }

    public function searchSchedules(SearchSchedulesRequest $req)
    {
        return view('allschedules')->with('items', $this->scheduleService->searchSchedules($req));
    }
}
