<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddScheduleRequest;
use App\Http\Requests\AddTeacherRequest;
use App\Http\Requests\AddUserRequest;
use App\Services\ScheduleService;
use App\Services\SubjectService;
use App\Services\UserService;
use Illuminate\Http\Request;
use \App\Models\Subject;

class AdminPageController extends Controller
{
    //
    private $subjectService;

    private $userService;

    private $scheduleService;


    public function __construct(SubjectService $subjectService, UserService $userService, ScheduleService $scheduleService)
    {
        $this->subjectService = $subjectService;
        $this->userService = $userService;
        $this->scheduleService = $scheduleService;
    }

    public function getTeacher(int $id){
        return view('addsubject')->with('what',$this->subjectService->showById($id));
    }

    public function addTeacher(AddTeacherRequest $req)
    {
        $this->subjectService->addTeacher($req);
        return redirect()->route('subjects')->with('success','Teacher was added successfully');
    }

    public function updateTeacher(Request $req, int $id)
    {
        $this->subjectService->updateTeacher($req, $id);
        return redirect()->route('subjects')->with('success','Teacher was updated successfully');
    }

    public function deleteTeacher(int $id){
        $this->subjectService->deleteTeacher($id);
        return redirect()->route('subjects')->with('success','Teacher was deleted successfully');
    }

    public function addUser(AddUserRequest $request){
        $this->userService->addUser($request);
        return redirect()->route('users')->with('success','User was added successfully');
    }
    public function editUser(Request $request, int $id){
        $this->userService->updateUser($request, $id);
        return redirect()->route('users')->with('success','User was updated successfully');
    }
    public function getUser(int $id){
        return view('adduser')->with('what',$this->userService->getUserById($id));
    }
    public function deleteUser(int $id){
        if(auth()->user()->id == $id ){
            return redirect()->route('users')->withErrors(['lulw'=>'You cant delete yourself']);
        }elseif($this->userService->isAdmin($id)){
            return redirect()->route('users')->withErrors(['lulw'=>'You cant delete an admin']);
        }else{
            $this->userService->deleteUser($id);
            return redirect()->route('users')->with('success','User was deleted successfully');
        }

    }

    public function addSchedule(AddScheduleRequest $req){
        $this->scheduleService->addUser($req);
        return redirect()->route('schedules', ['id'=>$req->id])->with('success','Schedule was added successfully');
    }

    public function getSchedule(int $id){
        return view('addschedule')->with('what',$this->scheduleService->getScheduleById($id));
    }

    public function editSchedule(Request $req, int $id){
        $this->scheduleService->editSchedule($id,$req);
        return redirect()->route('schedules', ['id'=>$req->id])->with('success','Schedule was updated successfully');
    }

    public function deleteSchedule(int $id, int $returnId){
        $this->scheduleService->deleteSchedule($id);
        return redirect()->route('schedules', ['id'=>$returnId])->with('success','Schedule was deleted successfully');
    }
}
