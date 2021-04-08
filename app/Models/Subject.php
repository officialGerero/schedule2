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
        'group_id',
        'semester'
    ];

    public function schedules(){
        return $this->hasMany('\App\Models\Schedule','subject_id', 'id');
    }

    public function scopeIdAsc($query){
        return $query->orderBy('id');
    }


}
