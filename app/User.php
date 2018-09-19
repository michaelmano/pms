<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The relationships we will always attach.
     */
    protected $with = ['profile'];

    /**
     * The eloquent events that should be dispatched.
     */
    protected $dispatchesEvents = [
        'created' => Events\User\Created::class,
    ];

    /**
     * The users profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * The roles that the current user has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * An easy way to check if the user has a certain role.
     *
     * @param string $title
     *
     * @return bool
     */
    public function hasRole(String $title)
    {
        return $this
            ->roles()
            ->get()
            ->contains('title', $title);
    }
}
