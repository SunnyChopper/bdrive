<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    protected $table = "course_enrollments";
    public $primaryKey = "id";
}
