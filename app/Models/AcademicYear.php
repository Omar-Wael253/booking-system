<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $fillable = [
        'start_year',
        'end_year'
    ];
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'center_teacher')
            ->withPivot('center_id', 'status');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
