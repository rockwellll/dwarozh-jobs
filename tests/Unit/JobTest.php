<?php

namespace Tests\Unit;

use App\Models\Job;
use function PHPUnit\Framework\assertNotNull;

it('a job that is created has a job type and belongs to a user', function () {
   $job = Job::factory()->create();

   assertNotNull($job->type->name);
   assertNotNull($job->owner->name);
});
