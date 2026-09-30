<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Session extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'day',
        'start_time',
        "end_time",
        'capacity'
    ];
    public function academicYear(){
        return $this->belongsTo(AcademicYear::class);
    }
    public function center()
    {
        return $this->belongsTo(Center::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
