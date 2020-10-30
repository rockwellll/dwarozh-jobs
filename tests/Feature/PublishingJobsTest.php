<?php

use function  Pest\Laravel\actingAs;

use App\Models\User;


it('will allow a user to access the page if they are a business user', function () {
    $this->get('/en/register')
        ->assertStatus(200);

    \App\Models\BusinessUser::factory()->create();

    $user =  User::factory()->create([
        'email' => 'test@test.com',
        'location' => 'Erbil',
        'userable_type' => 'App\Models\BusinessUser',
        'userable_id' => 1
    ]);

     actingAs($user)
         ->get('/en/jobs/new')
         ->assertSuccessful();
});

it('will not allow a user to visit the new job page if they are not a business user', function () {
    $user =  User::factory()->create([
        'email' => 'test@test.com',
        'location' => 'Erbil',
    ]);

    actingAs($user)
        ->get('/en/jobs/new')
        ->assertRedirect('/');
});
