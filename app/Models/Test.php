<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Translatable\Traits\HasTranslations;

class Test extends Model
{
    use HasTranslations;
   
    public $translatable = [];   

    protected $guarded = [];

    protected $appends = ['resource_url'];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getAnswersAttribute($answers){
        $array = json_decode($answers);
        shuffle($array);
        return $array;
    }

    public function check($completedTest){
        $this->attributes['correct_answer'] = $this->correct_answer_id;
        
        $this->attributes['is_selected'] = array_key_exists($this->id, $completedTest);

        if($this->is_selected){
            $this->attributes['selected_answer'] = $completedTest[$this->id];
            $this->attributes['is_correct'] = ($this->selected_answer == $this->correct_answer_id);
        }
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/tests/'.$this->getKey());
    }
}
