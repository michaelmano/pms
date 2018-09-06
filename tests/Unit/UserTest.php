<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Tests\TestCase;

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
    public function a_user_starts_with_the_employee_role()
    {
        $user = factory(User::class)->create();

        $this->assertTrue($user->hasRole('employee'));
    }

    /** @test */
    public function a_user_can_have_many_roles()
    {
        $user = factory(User::class)->create();
        $this->assertEquals($user->roles()->count(), 1);

        $role = Role::where('title', 'admin')->firstOrFail();
        $user->roles()->attach($role);
        $this->assertEquals($user->roles()->count(), 2);
    }

    /** @test */
    public function a_user_can_have_many_roles_but_they_have_to_be_unique()
    {
        $user = factory(User::class)->create();
        $role = Role::where('title', 'employee')->firstOrFail();

        try {
            $user->roles()->attach($role);
        } catch (QueryException $e) {
        }

        $this->assertEquals($user->roles()->count(), 1);
    }

    /** @test */
    public function a_user_has_a_profile()
    {
        $user = factory(User::class)->create();
        $this->assertNotEmpty($user->profile());
    }
}
