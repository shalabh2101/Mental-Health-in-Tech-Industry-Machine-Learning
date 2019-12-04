<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    public $timestamps = false;

    public function options()
    {
        return $this->hasMany(Option::class,'question_id','id');
    }

    public static function getQuestionWithOptions($question_id = null, $survey_id = null)
    {
        $query = self::with(['options' => function($question_query) {
        }]);

        if(!empty($question_id))
        {
            $query = $query->where(['id' => $question_id ]);
        }

        if(!empty($survey_id))
        {
            $query = $query->where(['survey_id' => $survey_id ]);
        }
//        //TEMP
//        $query = $query->where(['question_category' => 'MENTAL_HEALTH']);

        return $query->get();
    }
}
