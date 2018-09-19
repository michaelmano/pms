<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAway extends Model
{
    protected $table = 'users_away';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'returning',
        'reason',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'returning',
    ];

    /**
     * The user this profile belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
