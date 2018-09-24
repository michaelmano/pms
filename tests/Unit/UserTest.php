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
    public function a_user_has_a_full_name()
    {
        $user = factory(\App\User::class)->create();

        $this->assertEquals($user->name, "$user->first_name $user->last_name");
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
        $status = 'Out to lunch!';
        $user = factory(\App\User::class)->create();
        $user->profile->update(['status' => $status]);
        $this->assertEquals($user->profile->status, $status);
    }

    /** @test */
    public function a_user_can_be_away()
    {
        $reason = 'Out to lunch!';
        $returning = \Carbon\Carbon::now()->addMinutes(10);
        $user = factory(\App\User::class)->create();
        $away = factory(\App\UserAway::class)->create([
            'reason' => $reason,
            'returning' => $returning,
            'user_id' => $user->id,
        ]);

        $this->assertEquals($user->away->reason, $reason);
    }

    /** @test */
    public function a_user_can_have_tasks()
    {
        $user = $this->login();
        $this->assertEquals(0, $user->tasks()->count());

        // Create a project
        $project = factory(\App\Project::class)->create();
        // Create a task
        $task = factory(\App\Task::class)->create([
            'project_id' => $project->id,
        ]);

        // Add the user to the project.
        $project->users()->attach($user);

        $this->assertEquals(1, $user->tasks()->count());
    }
}
