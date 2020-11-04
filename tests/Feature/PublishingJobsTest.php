<?php

use function  Pest\Laravel\actingAs;

use App\Models\User;

it('will not allow a user to visit the new job page if they are not a business user', function () {
    $user =  User::factory()->create([
        'email' => 'test@test.com',
        'location' => 'Erbil',
    ]);

    actingAs($user)
        ->get('/en/jobs/new')
        ->assertRedirect('/');
});
