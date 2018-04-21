<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Input extends Model
{
    public static function sanitize($input){
        $sanitized = strip_tags($input);
        return preg_replace('/(^|)@([\w_]+)/', '<a href="../profile/$2">@$2</a>', $sanitized);    
    }
}
