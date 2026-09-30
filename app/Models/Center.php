<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'name'
    ];
    public function admins(){
        return $this->hasMany(Admin::class);
    }
    public function students(){
        return $this->belongsToMany(Student::class)->withPivot('student_number','status');
    }
    public function subjects(){
        return $this->belongsToMany(Subject::class)->withPivot('status');
    }
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withPivot('academic_year_id' , 'status');
    }
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
