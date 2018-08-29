<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'employee',
            'admin',
            'root',
        ])->each(function($title) {
            factory(Role::class)->create(['title' => $title]);
        });
    }
}
