<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //use HasFactory;

    protected $table= "favorites";

    public function favoritables()
    {
        return $this->morphTo('favoritable');
    }

    public function user()
    {
        return $this->belongsTo(DefaultUser::class);
    }
}
