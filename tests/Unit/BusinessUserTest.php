<?php

namespace Tests\Unit;

use App\BusinessUser;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Hash;
use function PHPUnit\Framework\assertEquals;

beforeEach(function () {

});

test('business users can create jobs', function () {
    $account = BusinessUser::create();

    $account->jobs()->save(Job::factory()->create());

    assertEquals(count($account->jobs), 1);
});

