<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day',
        'time',
        'subject_id',
        'group_id',
    ];

    public function scopeIdAsc($query)
    {
        return $query->orderBy('id');
    }

    public function user()
    {
        return $this->belongsTo('\App\Models\User','group_id','id');
    }

    public function getSubject()
    {
        return $this->belongsTo('\App\Models\Subject','subject_id','id');
    }
}
