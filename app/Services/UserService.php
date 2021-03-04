<?php

namespace App\Services;



use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService{

    public function isAdmin(int $id){
        $user = User::find($id);
        if($user->admin){
            return true;
        }else return false;
    }

    public function getUsers(){
        return User::paginate(10);
    }
    public function getUserById(int $id){
        return User::find($id);
    }

    public function addUser(AddUserRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = boolval($request->admin);
        $user->save();
    }

    public function updateUser($request, int $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = boolval($request->admin);
        $user->save();
    }

    public function deleteUser(int $id){
        $user = User::find($id);
        $user->delete();
    }

}
