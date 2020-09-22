<?php

namespace Tests\Unit;

use App\Models\BusinessUser;
use App\Models\Job;
use function PHPUnit\Framework\assertEquals;

beforeEach(function () {

});

test('business users can create jobs', function () {
    $account = BusinessUser::create();

    $account->jobs()->save(Job::factory()->create());

    assertEquals(count($account->jobs), 1);
});

