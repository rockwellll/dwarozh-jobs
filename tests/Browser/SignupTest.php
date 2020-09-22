<?php

use Laravel\Dusk\Browser;

use App\Models\User;

beforeEach(function () {
    User::factory()->create([
        'email' => 'test@test.com',
        'location' => 'Erbil',
    ]);
});

afterEach(function () {
    $this->browse(function (Browser $browser) {
        $browser->logout();
    });
});

it('allows to switch between kurdish and english locales', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/register')
            ->clickLink('گۆڕین بۆ کوردی')
            ->assertPathIs('/ku/register')
            ->clickLink('View in English')
            ->assertPathIs('/en/register');
    });
});


it('allows the user to create account if validation was successful, and redirects back to home page', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/register')
            ->type('firstName', 'John')
            ->type('lastName', 'Doe')
            ->type('email', 'john@doe.com')
            ->type('password', '12345678')
            ->type('password_confirmation', '12345678')
            ->select('location', 'erbil')
            ->attach('attachment', __DIR__.'/attachments/ahmed-cv.pdf')
            ->press('Create Account')
            ->assertPathIs('/en');
    });
});


it('notifies the user that the password must be at least 8 characters', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/register')
            ->type('firstName', 'John')
            ->type('lastName', 'Doe')
            ->type('email', 'john@doe.com')
            ->type('password', '11')
            ->type('password_confirmation', '11')
            ->select('location', 'erbil')
            ->press('Create Account')
            ->assertSee('The password must be at least 8 characters.');
    });
});


it('notifies the user that the passwords are not the same', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/register')
            ->type('firstName', 'John')
            ->type('lastName', 'Doe')
            ->type('email', 'john@doe.com')
            ->type('password', '1122334455')
            ->type('password_confirmation', '112233445577')
            ->select('location', 'erbil')
            ->press('Create Account')
            ->assertSee('The password confirmation does not match.');
    });
});

it('allows the user to switch between business and default user registration', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/register')
            ->clickLink('Create business account')
            ->assertPathIs('/en/register/business')
            ->clickLink('Create account')
            ->assertPathIs('/en/register');
    });
});



it('allows the business user to create account and redirect back to home page', function () {
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
    });
});
