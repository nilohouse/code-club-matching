<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClubCoordinates extends Model
{
    protected $club_hash;
    protected $name;
    protected $lat;
    protected $lng;
    protected $distance;
}
