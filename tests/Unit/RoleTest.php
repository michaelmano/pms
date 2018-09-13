<?php

namespace Tests\Unit;

use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Tests\TestCase;

class roleTest extends TestCase
{
    /** @test */
    public function a_role_can_belong_to_many_users()
    {
        factory(User::class, 2)->create();
        $role_count = Role::find(1)->users()->count();

        $this->assertEquals($role_count, 2);
    }

    /** @test */
    public function a_role_title_has_to_be_unique()
    {
        $previous_roles_count = Role::all()->count();

        try {
            factory(Role::class, 2)->create([
                'title' => 'a non unique role title',
            ]);
        } catch (QueryException $e) {
        }

        $this->assertEquals(Role::all()->count(), $previous_roles_count + 1);
    }
}
