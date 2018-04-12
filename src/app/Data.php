<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'site_data';
    public $primaryKey = 'name';
}
