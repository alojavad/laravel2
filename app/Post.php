<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function topic()
    {
        return $this->belongsTo('Topic');
    }

}
