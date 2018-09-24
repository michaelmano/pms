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
     * Mutator to join the users first and last name.
     */
    public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

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

    /**
     * If the current user is away or not.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function away()
    {
        return $this->hasONe(UserAway::class);
    }

    /**
     * The projects the current user is assigned to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * The tasks the user is currently assigned.
     */
    public function tasks()
    {
        return $this->projects()
            ->get()
            ->map(function ($project) {
                return $project
                    ->tasks()
                    ->get();
            });
    }
}
