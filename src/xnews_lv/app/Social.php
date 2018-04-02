<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'socials';
    public $primaryKey = 'id';
    public $timestamps = true;
}
