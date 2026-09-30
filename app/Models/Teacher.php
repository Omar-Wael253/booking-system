<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'phone_number'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function centers(){
        return $this->belongsToMany(Center::class)->withPivot('status' , 'academic_year_id');
    }
    public function availabilities()
    {
        return $this->hasMany(TeacherAvailability::class);
    }
    public function sessions(){
        return $this->hasMany(Session::class);
    }
}
