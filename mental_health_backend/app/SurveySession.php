<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveySession extends Model
{
    protected $table = "survey_session";
    public $timestamps = false;

    protected $fillable = ['start_time'];
}
