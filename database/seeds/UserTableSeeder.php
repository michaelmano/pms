<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root_user = factory(User::class)->create([
            'first_name' => 'BCM',
            'last_name' => 'Digital',
            'email' => env('ROOT_APPLICATION_USER_EMAIL'),
            'password' => Hash::make(env('ROOT_APPLICATION_USER_PASSWORD')),
        ]);
        $root_user->roles()->attach(\App\Role::find(3));
    }
}
