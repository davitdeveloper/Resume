<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    /**
     * @var string
     */
    protected $table = 'educations';

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
