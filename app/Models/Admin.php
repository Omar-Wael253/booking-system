<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'position'
    ];
    public function center(){
        return $this->belongsTo(Center::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
