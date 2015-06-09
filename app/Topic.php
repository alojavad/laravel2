<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function posts()
    {
        return $this->hasMany('Post');
    }

}
