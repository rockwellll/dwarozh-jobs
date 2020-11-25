<?php

namespace Tests\Feature;

it('creates user account and redirects back to home page', function () {
   $this->get('/en/register')
        ->assertStatus(200);

   $this->post('/en/register', [
       'firstName' => 'john',
       'lastName' => 'doe',
       'email' => 'john@doe.com',
       'location' => 'erbil',
       'password' => '11223344',
       'password_confirmation' => '11223344',
       'mobileNumber' => '111-222-333-4444'
   ])->assertRedirect('/en');
});

it("redirects back when validation fails", function () {
    $this->post('/en/register', [
        'location' => 'erbil',
        'password' => '1122',
        'password_confirmation' => '112233',
        'mobileNumber' => '11223344'
    ])->assertStatus(302);
});
