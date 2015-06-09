<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public $timestamps = true;

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

}
