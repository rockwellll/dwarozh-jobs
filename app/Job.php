<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(BusinessUser::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(DefaultUser::class, 'applicant_job', 'applicant_id', 'job_id');
    }
}
