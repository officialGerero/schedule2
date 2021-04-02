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
        $this->scheduleService->addSchedule($req);
        return redirect()->route('schedules', ['id'=>$req->id])->with('success','Schedule was added successfully');
    }

    public function getSchedule(int $id){
        return view('addschedule')->with('what',$this->scheduleService->getScheduleById($id));
    }

    public function editScheduleId(EditScheduleRequest $req, int $id){
        $this->scheduleService->editSchedule($id,$req);
        return redirect()->route('schedules', ['id'=>$req->id])->with('success','Schedule was updated successfully');
    }

    public function deleteScheduleId(int $id, int $returnId){
        $this->scheduleService->deleteSchedule($id);
        return redirect()->route('schedules', ['id'=>$returnId])->with('success','Schedule was deleted successfully');
    }

    public function editScheduleAll(EditScheduleRequest $req, int $id){
        $this->scheduleService->editSchedule($id,$req);
        return redirect()->route('schedules.all')->with('success','Schedule was updated successfully');
    }

    public function deleteScheduleAll(int $id){
        $this->scheduleService->deleteSchedule($id);
        return redirect()->route('schedules.all')->with('success','Schedule was deleted successfully');
    }

    public function prepareToAddScheduleAll(){
        return view();
    }

    public function prepareToAddScheduleId(int $id){

        return view('addschedule')->with([
            'subjects'=> $this->scheduleService->getSubjects($id),
            'user'=>$this->scheduleService->getUserInfo($id),
        ]);
    }

}
