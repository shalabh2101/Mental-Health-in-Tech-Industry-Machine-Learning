<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public $timestamps = false;
    protected $table = "survey";

    public function questions()
    {
        return $this->hasMany(Question::class,'survey_id','id');
    }

    public static function getSurveyWithQuestions($survey_id = null)
    {
        $query = self::with(['questions' => function($question_query) {

        }]);

        if(!empty($survey_id))
        {
            $query = $query->where(['id' => $survey_id ]);
        }

        return $query->get();
    }

    public static function getSurveyWithQuestionAndOptions()
    {
        $query = self::with(['questions' => function($question_query) {

        },
            'questions.options' => function ($option_query){

            },

            ]);

        return $query->get();
    }

}
