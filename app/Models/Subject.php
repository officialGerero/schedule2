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
    ];

    public function subjectToUserRel(){
        return $this->hasMany('\App\Models\User','id','groupID');
    }
    public function schedRel(){
        return $this->belongsTo('\App\Models\Schedule','id','subject_id');
    }


}
