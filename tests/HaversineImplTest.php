<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Helpers\HaversineImpl;

class HaversineImplTest extends TestCase
{
    public function testExample()
    {
    	$ltFrom = -22.8047129;
    	$lgFrom = -43.4222807;
    	$ltTo = -22.9399730;
    	$lgTo = -43.2010957;

    	$haversine = new HaversineImpl;
    	$haversine->pointA($ltFrom, $lgFrom);
    	$haversine->pointB($ltTo, $lgTo);

        $distance = $haversine->calculate();

        $this->assertGreaterThan(0, $distance);
        $this->assertLessThan(50, $distance);
    }
}
