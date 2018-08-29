<?php

namespace Tests\Unit;

use App\User;
use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\QueryException;

class UserTest extends TestCase
{
    /** @test */
    public function a_user_has_a_first_and_last_name()
    {
        $user = factory(User::class)->create();

        $this->assertNotEmpty($user->first_name);
        $this->assertNotEmpty($user->last_name);
    }

    /** @test */
    public function a_user_starts_with_no_roles()
    {
        $user = factory(User::class)->create();
        $this->assertEmpty($user->roles);
    }

    /** @test */
    public function a_user_can_have_many_roles()
    {
        $user = factory(User::class)->create();
        $role_one = factory(Role::class)->create();
        $role_two = factory(Role::class)->create();

        $user->roles()->attach($role_one);

        $this->assertEquals($user->roles()->count(), 1);

        $user->roles()->attach($role_two);

        $this->assertEquals($user->roles()->count(), 2);
    }

    /** @test */
    public function a_user_can_have_many_roles_but_they_have_to_be_unique()
    {

        $user = factory(User::class)->create();
        $role = factory(Role::class)->create();

        try {
            $user->roles()->attach($role);
            $user->roles()->attach($role);
        } catch(QueryException $e) {}

        $this->assertEquals($user->roles()->count(), 1);
    }
}
