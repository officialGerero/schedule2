<?php

namespace App\Services;

use App\Http\Requests\AddScheduleRequest;
use App\Models\Schedule;

class ScheduleService{


    public function showSchedules(int $id)
    {
        return Schedule::where('group_ID',$id)->IdAsc()->paginate(10);
    }

    public function addSchedule(AddScheduleRequest $req)
    {
        $schedule = new Schedule();
        $this->saveSchedule($schedule, $req);
    }

    public function getScheduleById(int $id)
    {
        return Schedule::find($id);
    }
    public function saveSchedule(Schedule $schedule, $req){
        $schedule->day = $req->day;
        $schedule->time = $req->time;
        $schedule->subject_id = $req->subject_id;
        $schedule->group_ID = $req->group_ID;
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
