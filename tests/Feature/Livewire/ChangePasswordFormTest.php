<?php

use App\Http\Livewire\UpdateInformation\ChangePasswordForm;
use App\Models\DefaultUser;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

it("renders on the page", function () {
    $account = DefaultUser::create();

    $account->user()->save(User::factory()->create());

    actingAs($account->user)
        ->get("/en/account?tab=update")
        ->assertSeeLivewire("update-information.change-password-form");
});


it("will toggle the state of password visiblity on the frontend", function () {
    $account = DefaultUser::create();

    $account->user()->save(User::factory()->create());

    Livewire::actingAs($account->user);

    livewire(ChangePasswordForm::class, ["user" => $account->user])
        ->assertSet("showPassword", false)
        ->call("togglePasswordVisibility")
        ->assertSet("showPassword", true);
});

it("will throw validation errors if one of the fields is empty", function () {
    $account = DefaultUser::create();
    $account->user()->save(User::factory()->create(["password" => "11223344"]));

    livewire(ChangePasswordForm::class, ["user" => $account->user])
        ->set("old", "11223344")
        ->call("updatePassword")
        ->assertHasNoErrors("old")
        ->assertHasErrors(["password" => "required"]);
});

//it("will successfully update the user password and session notification to the user", function () {
//    $account = DefaultUser::create();
//    $account->user()->save(User::factory()->create(["password" => "11223344"]));
//
//    livewire(ChangePasswordForm::class, ["user" => $account->user])
//        ->set("old", "11223344")
//        ->set("password", "22334411")
//        ->set("password_confirmation", "22334411")
//        ->call("updatePassword")
//        ->assertHasNoErrors(["old", "password"]);
//});
