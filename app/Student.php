<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * @package App
 */
class Student extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'semester_id',
        'email',
        'address',
        'phone',
        'parent_name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function semester()
    {
        return $this->belongsTo(Semester::class);

    }
}
