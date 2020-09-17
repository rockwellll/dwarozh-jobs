<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function job(){
        return $this->belongsTo(BusinessUser::class);
    }
     public function user(){
        return $this->hasMany(DefaultUser::class);
     }
}
