<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int id
 * @property Activity[] activities
 */
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** @var array */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return HasMany
     */
    public function activities()
    {
        // A User can have many Activities
        return $this->hasMany('App\Activity');
    }

    /**
     * @param Activity $activity
     * @return User
     */
    public function addActivity(Activity $activity)
    {
        // associate the passed Activity with the User
        return $this->activities()->save($activity);
    }
}
