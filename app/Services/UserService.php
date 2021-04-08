<?php

namespace App\Services;



use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService{

    public function showUsers()
    {
        return User::IdAsc()->paginate(10);
    }

    public function getUsers()
    {
        return User::all();
    }

    public function getUserById(int $id)
    {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        return $user;
    }

    public function addUser(AddUserRequest $request)
    {
        $user = new User();
        $this->saveUser($user, $request);
    }

    public function saveUser(User $user, $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin = boolval($request->admin);
        $user->save();
    }

    public function updateUser($request, int $id)
    {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        $this->saveUser($user, $request);
    }

    public function deleteUser(int $id)
    {
        $user = User::find($id);
        if(!$user){
            abort(404);
        }
        $user->delete();
    }
}
