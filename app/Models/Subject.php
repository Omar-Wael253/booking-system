<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name'
    ];
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
    public function centers(){
        return $this->belongsToMany(Center::class)->withPivot('status');
    }
}
