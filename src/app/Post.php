<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function updater(){
        return $this->belongsTo('App\User', 'update_id');
    }
}
