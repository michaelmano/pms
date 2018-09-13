<?php

use App\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'Not started',
            'In progress',
            'Completed',
        ])->each(function($title) {
            factory(TaskStatus::class)->create(['title' => $title]);
        });
    }
}
