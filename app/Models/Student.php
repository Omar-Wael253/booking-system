<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $fillable = [
            'name',
            'student_phone',
            'parent_name',
            'parent_phone'
        ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function centers(){
        return $this->belongsToMany(Center::class)->withPivot('student_number' , 'status');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
