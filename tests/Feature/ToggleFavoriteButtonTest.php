<?php


use App\Models\BusinessUser;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;
use function PHPUnit\Framework\assertEquals;

function data()
{
    Artisan::call('db:seed');
    $account = BusinessUser::create();

    $account->jobs()->save(Job::factory()->create());

    $user = User::factory()->create();
    $u = \App\Models\DefaultUser::create();

    $u->user()->save($user);

    return $user;
}

it('the toggle button will be visible for authenticated users who are not business users', function () {
    $user = data();
    actingAs($user)
        ->get('/en/jobs')
        ->assertSeeLivewire('favorite-button');
});

it('a user can toggle the favorite status for a posted job', function () {
    $user = data();
    \Livewire\Livewire::actingAs($user);
    $job = Job::first();

    assertEquals(0, count($user->userable->favorites(Job::class)->get()));

    livewire(\App\Http\Livewire\FavoriteButton::class, ['job' => $job])
        ->assertSet('isFavorited', false)
        ->call('submit')
        ->assertSet('isFavorited', true);

    assertEquals(1, count($user->userable->favorites(Job::class)->get()));

    livewire(\App\Http\Livewire\FavoriteButton::class, ['job' => $job])
        ->assertSet('isFavorited', true)
        ->call('submit')
        ->assertSet('isFavorited', false);

});
