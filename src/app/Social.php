<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'socials';
    public $primaryKey = 'user_id';
    public $timestamps = true;
}
