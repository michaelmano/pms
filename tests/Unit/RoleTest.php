<?php

namespace Tests\Unit;

use Illuminate\Database\QueryException;
use Tests\TestCase;

class roleTest extends TestCase
{
    /** @test */
    public function a_role_can_belong_to_many_users()
    {
        factory(\App\User::class, 2)->create();
        $role_count = \App\Role::find(1)->users()->count();

        $this->assertEquals($role_count, 2);
    }

    /** @test */
    public function a_role_title_has_to_be_unique()
    {
        $previous_roles_count = \App\Role::all()->count();

        try {
            factory(\App\Role::class, 2)->create([
                'title' => 'a non unique role title',
            ]);
        } catch (QueryException $e) {
        }

        $this->assertEquals(\App\Role::all()->count(), $previous_roles_count + 1);
    }
}
