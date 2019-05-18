<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicCourseEnrollment extends Model
{
    protected $table = "public_course_enrollments";
    public $primaryKey = "id";
}
