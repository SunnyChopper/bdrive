<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = "leads";
    public $primaryKey = "id";
}
