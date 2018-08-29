<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * A role can have many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function Permissions()
    {
        return $this->hasMany(Permission::class);
    }

    /**
     * A role belongs to many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function Users()
    {
        return $this->belongsToMany(User::class);
    }
}
