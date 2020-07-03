<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static Resume create(array $attrs)
 */
class Resume extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'firstname', 'lastname', 'email', 'phone', 'address', 'birth_day'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(Language::class);
    }



}
