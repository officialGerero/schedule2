<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherRequest;
use App\Http\Requests\AddUserRequest;
use App\Services\SubjectService;
use App\Services\UserService;
use Illuminate\Http\Request;
use \App\Models\Subject;

class AdminPageController extends Controller
{
    //
    private $subjectService;

    private $userService;


    public function __construct(SubjectService $subjectService, UserService $userService)
    {
        $this->subjectService = $subjectService;
        $this->userService = $userService;
    }

    public function getTeacher(int $id){
        return view('addsubject')->with('what',$this->subjectService->showById($id));
    }

    public function addTeacher(AddTeacherRequest $req)
    {
        $this->subjectService->addTeacher($req);
        return redirect()->route('subjects')->with('success','Teacher was added successfully');
    }

    public function updateTeacher(AddTeacherRequest $req, int $id)
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
        $this->userService->deleteUser($id);
        return redirect()->route('users')->with('success','User was deleted successfully');
    }
}
