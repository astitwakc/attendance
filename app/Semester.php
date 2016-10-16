<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Semester
 * @package App
 */
class Semester extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
