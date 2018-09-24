<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /** @test */
    public function a_guest_can_not_register()
    {
        $response = $this->get('/register');
        $response->assertStatus(404);

        $response = $this->get('/auth/register');
        $response->assertStatus(405);

        $details = [
            'first_name' => 'Bob',
            'last_name' => 'Jane',
            'email' => 'test-user-email@bcm.com.au',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $json_response = $this->json('POST', '/auth/register', $details);

        $json_response
            ->assertStatus(401)
            ->assertJson([
                'message' => 'Unauthorized.',
            ]);
    }

    /** @test */
    public function a_user_can_register_someone_else()
    {
        $user = $this->login();

        $details = [
            'first_name' => 'Bob',
            'last_name' => 'Jane',
            'email' => 'test-user-email@bcm.com.au',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $normal_user_response = $this->json('POST', '/auth/register', $details);
        $normal_user_response
            ->assertStatus(401)
            ->assertJson([
                'message' => 'Unauthorized.',
            ]);

        $user->roles()->attach(\App\Role::find(2));

        $admin_user_response = $this->json('POST', '/auth/register', $details);
        $admin_user_response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Success.',
            ]);
    }
}
