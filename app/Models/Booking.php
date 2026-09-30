<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
