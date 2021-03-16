<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddScheduleRequest;
use App\Http\Requests\EditScheduleRequest;
use App\Services\ScheduleService;
use Illuminate\Http\Request;

class ScheduleController extends Controller{
    private $scheduleService;

    public function __construct(ScheduleService $scheduleService)
    {
        $this->scheduleService=$scheduleService;
    }

    public function addSchedule(AddScheduleRequest $req){
        $this->scheduleService->addUser($req);
        return redirect()->route('schedules', ['id'=>$req->id])->with('success','Schedule was added successfully');
    }

    public function getSchedule(int $id){
        return view('addschedule')->with('what',$this->scheduleService->getScheduleById($id));
    }

    public function editSchedule(EditScheduleRequest $req, int $id){
        $this->scheduleService->editSchedule($id,$req);
        return redirect()->route('schedules', ['id'=>$req->id])->with('success','Schedule was updated successfully');
    }

    public function deleteSchedule(int $id, int $returnId){
        $this->scheduleService->deleteSchedule($id);
        return redirect()->route('schedules', ['id'=>$returnId])->with('success','Schedule was deleted successfully');
    }

}
