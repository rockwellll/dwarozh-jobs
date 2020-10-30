<?php

use App\Models\User;
use Laravel\Dusk\Browser;

it('will show a link to post jobs if the current user is a business user', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/register/business')
            ->type('name', 'John')
            ->type('email', 'john@doe.com')
            ->type('mobileNumber', '111-222-3333')
            ->type('password', '12345678')
            ->type('password_confirmation', '12345678')
            ->select('location', 'duhok')
            ->press('Create Account')
            ->assertPathIs('/en');

        $browser->assertSeeLink('Publish a job')
                ->clickLink('Publish a job')
                ->assertPathIs('/en/jobs/new');
    });
});


it('will not show a link to post jobs if the current user is not a business user', function () {
    $this->browse(function (Browser $browser) {
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'location' => 'Erbil',
        ]);

        $browser->loginAs($user)
            ->visit('/en')
            ->assertDontSeeLink('Publish a job');
    });
});
