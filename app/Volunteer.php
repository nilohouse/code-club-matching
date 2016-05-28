<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    public function setBirth($value)
    {
    	$this->attributes['birth'] = date_create_from_format("d/m/Y", $value);
    }
}
