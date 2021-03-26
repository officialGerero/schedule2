<?php

namespace App\Services;

use App\Http\Requests\AddScheduleRequest;
use App\Models\Schedule;

class ScheduleService{

    private $us;

    public function __construct(UserService $us)
    {
        $this->us = $us;
    }


    public function showSchedules(int $id)
    {
        $user = $this->us->getUserById($id);
        return $user->schedule()->IdAsc()->paginate(10);
    }

    public function addSchedule(AddScheduleRequest $req)
    {
        $schedule = new Schedule();
        $this->saveSchedule($schedule, $req);
    }

    public function getSchedules(){
        $schedules = auth()->user()->getSchedules()->groupBy('day')->toArray();
        return $schedules;
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
}
