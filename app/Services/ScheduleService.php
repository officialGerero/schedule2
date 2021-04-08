<?php

namespace App\Services;

use App\Http\Requests\AddScheduleRequest;
use App\Models\Schedule;

class ScheduleService{

    private $subjectService;

    private $userService;



    public function __construct(SubjectService $subjectService, UserService $userService)
    {
        $this->subjectService = $subjectService;
        $this->userService = $userService;
    }

    public function showAllSchedules(){
        return Schedule::paginate(10);
    }

    public function getAllSchedules(){
        return Schedule::all();
    }

    public function showSchedules(int $id)
    {
        $user = $this->userService->getUserById($id);
        return $user->schedule()->IdAsc()->paginate(10);
    }

    public function addSchedule(AddScheduleRequest $req)
    {
        $schedule = new Schedule();
        $this->saveSchedule($schedule, $req);
    }

    public function getSchedules(){
        return auth()->user()->getSchedules()->groupBy('day')->toArray();
    }

    public function getSchedulesAPI(){
        return response()->json(['error' =>'Nothing to see here big guy']);
    }

    public function getScheduleById(int $id)
    {
        return Schedule::find($id);
    }

    public function saveSchedule(Schedule $schedule, $req){
        $schedule->day = $req->day;
        $schedule->time = $req->time;
        $schedule->subject_id = $req->subject_id;
        $schedule->group_id = $req->group_id;
        $schedule->classroom = $req->classroom;
        $schedule->save();
    }

    public function editSchedule(int $id, $req)
    {
        $schedule = Schedule::find($id);
        $this->saveSchedule($schedule, $req);
    }

    public function deleteSchedule(int $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
    }

    public function getSubjects(int $id){
        return $this->subjectService->getAllSubjectsForUser($id);
    }

    public function getUserInfo(int $id){
        return $this->userService->getUserById($id);
    }

    public function searchSchedules($req){
        if($req->field === "2"){
            return Schedule::where('subject_id',$req->search)->paginate(10);
        }else{
            return Schedule::where('group_id',$req->search)->paginate(10);
        }
    }
}
