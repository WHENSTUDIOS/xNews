<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'follows';
    public $primaryKey = 'id';
    public $timestamps = true;
}
