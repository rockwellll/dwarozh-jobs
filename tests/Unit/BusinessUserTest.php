<?php

namespace Tests\Unit;

use App\Models\BusinessUser;
use App\Models\Job;
use Illuminate\Support\Facades\Artisan;
use function PHPUnit\Framework\assertEquals;

test('business users can create jobs', function () {
    Artisan::call('db:seed');
    $account = BusinessUser::create();

    $account->jobs()->save(Job::factory()->create());

    assertEquals(count($account->jobs), 1);
});

