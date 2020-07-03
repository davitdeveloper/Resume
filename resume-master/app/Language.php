<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['resume_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
