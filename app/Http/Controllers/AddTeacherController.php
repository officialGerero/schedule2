<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherRequest;
use App\Services\AddToDBService;
use Illuminate\Http\Request;
use \App\Models\Subject;

class AddTeacherController extends Controller
{
    //
    private $addToDBService;


    public function __construct( AddToDBService $addToDBService)
    {
        $this->addToDBService = $addToDBService;
    }

    function addTeacher(AddTeacherRequest $req)
    {
        $this->addToDBService->addTeacher($req);

    }
}
