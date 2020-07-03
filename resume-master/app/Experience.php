<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
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
