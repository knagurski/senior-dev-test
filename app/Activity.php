<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property User user
 */
class Activity extends Model
{
    use SoftDeletes;

    /** @var array */
    protected $fillable = ['subject'];

    /** @var array */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /** @var array */
    protected $hidden = ['user_id', 'deleted_at', 'user'];

    /**
     * @return BelongsTo
     */
    public function user()
    {
        // An Activity is associated with a single User
        return $this->belongsTo('App\User');
    }
}
