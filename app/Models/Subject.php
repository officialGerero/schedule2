<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_sub',
        'name_teacher',
        'groupID',
        'semester'
    ];

    public function subjectToUserRel(){
        return $this->hasMany('\App\Models\User','id','groupID');
    }
    public function schedRel(){
        return $this->hasMany('\App\Models\Schedule','groupID', 'groupID');
    }


}
