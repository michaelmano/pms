<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * A permission can belong to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function Roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
