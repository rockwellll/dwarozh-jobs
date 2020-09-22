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

it('logs the user in when the credintial are correct', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/login')
            ->type('email', 'test@test.com')
            ->type('password', 'password')
            ->press('Login')
            ->assertPathIs('/en');
    });
});


//it('redirects a user to home page when trying to reach authentication pages if authenticated', function () {
//    $this->browse(function (Browser $browser) {
//        $browser->loginAs(User::find(1))
//            ->visit('/en/register')
//            ->assertPathIs('/home');
//    });
//});

it('notifies the user if validation fails', function () {
   $this->browse(function (Browser $browser) {
     $browser->visit('/en/login')
         ->type('email', 'test@test.com')
         ->type('password', 'wrong password')
         ->press('Login')
         ->assertPathIs('/en/login')
         ->assertSee('These credentials do not match our records.');
   });
});

it('takes the user to registration page when clicking signup link', function () {
   $this->browse(function (Browser $browser) {
      $browser->visit('/en/login')
          ->clickLink('Create Account')
          ->assertPathIs('/en/register');
   });
});


it('changes the language and redirects back to the new language url', function (){
    $this->browse(function (Browser $browser) {
        $browser->visit('/en/login')
            ->clickLink('گۆڕین بۆ کوردی')
            ->assertPathIs('/ku/login');
    });
});
