<?php

namespace App\Http\Controllers;


use App\Services\SubjectService;
use App\Services\UserService;
use Illuminate\Http\Request;

class ListsPageController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function users(){
        return view('usersList')->with('items',$this->userService->getUsers());
    }

    public function subjects(SubjectService $subjectService){
        return view('subjects')->with('items', $subjectService->showAll());
    }
}
