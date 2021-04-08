<?php

namespace App\Services;

use App\Models\Subject;


class SubjectService{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function showById(int $id)
    {
        $subject = Subject::find($id);
        if(!$subject){
            abort(404);
        }
        return $subject;
    }

    public function getUsersInfo()
    {
        return $this->userService->getUsers();
    }

    public function showAllSubjects()
    {
        return Subject::IdAsc()->paginate(10);
    }

    public function getAllSubjectsForUser(int $id)
    {
        $subject = Subject::where('group_id',$id)->get();
        if(!$subject){
            abort(404);
        }
        return $subject;
    }

    public function addSubject($req)
    {
        $sub = new Subject;
        $this->saveSubject($sub,$req);
    }

    public function saveSubject(Subject $sub, $req)
    {
        $sub->name_sub=$req->name_sub;
        $sub->name_teacher=$req->name_teacher;
        $sub->group_id=$req->group_id;
        $sub->semester=$req->semester;
        $sub->save();
    }

    public function updateSubject($req, $id)
    {
        $subject = Subject::find($id);
        if(!$subject){
            abort(404);
        }
        $this->saveSubject($subject,$req);
    }

    public function deleteSubject(int $id)
    {
        $sub = Subject::find($id);
        if(!$subject){
            abort(404);
        }
        $subject->delete();
    }
}
