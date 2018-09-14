<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The Project the task belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * The current status of this task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'task_status_id');
    }
}
