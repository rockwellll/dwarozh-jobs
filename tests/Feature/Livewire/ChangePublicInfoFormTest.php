<?php

use App\Models\User;

use Livewire\Livewire;
use function  \Pest\Livewire\livewire;

use \App\Http\Livewire\UpdateInformation\ChangePublicInfoForm;

it("renders on the page", function () {
    $account = \App\Models\DefaultUser::create();

    $account->user()->save(User::factory()->create());

    \Pest\Laravel\actingAs($account->user)
        ->get("/en/account?tab=update")
        ->assertSeeLivewire("update-information.change-public-info-form");
});

it('all values will have initial value', function () {
    $account = \App\Models\DefaultUser::create();

    $account->user()->save(User::factory()->create());

    Livewire::actingAs($account->user);

    livewire(ChangePublicInfoForm::class, ["user" => $account->user])
        ->assertSet("name", $account->name)
        ->assertSet("location" , $account->location)
        ->assertSet('email', $account->email);
});

it("will throw validation errors if an input is empty", function () {
    $account = \App\Models\DefaultUser::create();
    $account->user()->save(User::factory()->create());
    $secondAccount = User::factory()->create();

    Livewire::actingAs($account->user);

    livewire(ChangePublicInfoForm::class, ["user" => $account->user])
        ->set("email", "")
        ->call("updatePublicInformation")
        ->assertHasErrors(["email" => "required"])
        ->set("email", $secondAccount->email)
        ->assertHasErrors("email");
});

it("will send session information when operation successful", function () {
    $account = \App\Models\DefaultUser::create();
    $account->user()->save(User::factory()->create());

    Livewire::actingAs($account->user);

    livewire(ChangePublicInfoForm::class, ["user" => $account->user])
        ->set("name", "John Doe")
        ->call("updatePublicInformation")
        ->assertSee(__("users/default-user.info_updated_success"))
        ->assertSet("name", "John Doe");

});
