<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCard extends Model
{
    protected $guarded = [];

    //-------------------- Static methods --------------------//
    public static function createFromCourse(Course $course)
    {
        return static::create([
            'course_id' => $course->id,
            'short_text' => $course->num_of_classes . ' clases / Profesor(a): ' . $course->profesor,
            'long_description' => $course->descripcion,
        ]);
    }
}
