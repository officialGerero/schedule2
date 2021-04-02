<?php

namespace App\Services;



use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService{

    public function isAdmin(int $id){
        $user = User::find($id);
        return $user->admin;
    }

    public function showUsers(){
        return User::IdAsc()->paginate(10);
    }
    public function getUsers(){
        return User::all();
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
