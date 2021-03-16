<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService=$userService;
    }


    public function addUser(AddUserRequest $request){
        $this->userService->addUser($request);
        return redirect()->route('users')->with('success','User was added successfully');
    }
    public function editUser(EditUserRequest $request, int $id){
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
}

