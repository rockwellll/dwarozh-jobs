<?php
//
//use App\Models\Job;
//use Illuminate\Support\Facades\Artisan;
//use function Pest\Livewire\livewire;
//use function  Pest\Laravel\actingAs;
//
//use App\Models\User;
//use App\Models\BusinessUser;
//
//it('the toggle button will be visible for authenticated users', function () {
//    Artisan::call('db:seed');
//    $account = BusinessUser::create();
//
//    $account->jobs()->save(Job::factory()->create());
//
//
//    actingAs(User::factory()->create())
//        ->get('/jobs')        ->assertSeeLivewire('favorite-button');
//});
