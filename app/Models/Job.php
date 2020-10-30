<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Job extends Model
{
    use HasFactory, HasTrixRichText;

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(BusinessUser::class, 'business_user_id');
    }

    public function applicants()
    {
        return $this->belongsToMany(DefaultUser::class, 'applicant_job', 'applicant_id', 'job_id');
    }

    public function type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }
}
