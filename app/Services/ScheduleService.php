<?php

namespace App\Services;




use App\Http\Requests\AddScheduleRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\Request;

class ScheduleService{


    public function showSchedules(int $id)
    {
        return Schedule::where('groupID',$id)->paginate(10);
    }

    public function addUser(AddScheduleRequest $req)
    {
        $schedule = new Schedule();
        $schedule->day = $req->day;
        $schedule->time = $req->time;
        $schedule->subject_id = $req->subject_id;
        $schedule->groupID = $req->groupID;
        $schedule->classroom = $req->classroom;
        $schedule->save();
    }

    public function getScheduleById(int $id)
    {
        return Schedule::find($id);
    }

    public function editSchedule(int $id, $req)
    {
        $schedule = Schedule::find($id);
        $schedule->day = $req->day;
        $schedule->time = $req->time;
        $schedule->subject_id = $req->subject_id;
        $schedule->groupID = $req->groupID;
        $schedule->classroom = $req->classroom;
        $schedule->save();
    }

    public function deleteSchedule(int $id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
    }
}
