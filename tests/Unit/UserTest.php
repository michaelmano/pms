<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test */
    public function a_user_has_a_first_and_last_name()
    {
        $user = factory(\App\User::class)->create();

        $this->assertNotEmpty($user->first_name);
        $this->assertNotEmpty($user->last_name);
    }

    /** @test */
    public function a_user_starts_with_no_roles()
    {
        $user = factory(\App\User::class)->create();
        $this->assertEmpty($user->roles);
    }

    /** @test */
    public function a_user_can_have_many_roles()
    {
        $user = factory(\App\User::class)->create();
        $role = factory(\App\Role::class)->create();
        $user->attach($role);

        $this->assertNotEmpty($user->roles);
    }
}
