<?php

namespace App\Models;

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

}
