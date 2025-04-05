<?php
namespace Tests\Traits;
use App\Models\User;
use Laravel\Passport\Passport;

trait AuthTrait
{
    public function authenticate()
    {
        $user = User::factory()->create();
        Passport::actingAs($user);
        return $user;
    }

}
