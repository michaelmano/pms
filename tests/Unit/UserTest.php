<?php

namespace Tests\Unit;

use Illuminate\Database\QueryException;
use Tests\TestCase;

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
    public function a_user_starts_with_the_employee_role()
    {
        $user = factory(\App\User::class)->create();

        $this->assertTrue($user->hasRole('employee'));
    }

    /** @test */
    public function a_user_can_have_many_roles()
    {
        $user = factory(\App\User::class)->create();
        $this->assertEquals($user->roles()->count(), 1);

        $role = \App\Role::where('title', 'admin')->firstOrFail();
        $user->roles()->attach($role);
        $this->assertEquals($user->roles()->count(), 2);
    }

    /** @test */
    public function a_user_can_have_many_roles_but_they_have_to_be_unique()
    {
        $user = factory(\App\User::class)->create();
        $role = \App\Role::where('title', 'employee')->firstOrFail();

        try {
            $user->roles()->attach($role);
        } catch (QueryException $e) {
        }

        $this->assertEquals($user->roles()->count(), 1);
    }

    /** @test */
    public function a_users_profile_is_created_automatically()
    {
        $user = factory(\App\User::class)->create();
        $this->assertNotEmpty($user->profile->id);
    }

    /** @test */
    public function a_user_has_a_status()
    {
        $user = factory(\App\User::class)->create();
        $this->assertEmpty($user->status);
    }
}
