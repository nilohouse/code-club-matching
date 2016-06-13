<?php

namespace App\Helpers;

class HaversineImpl implements DistanceCalculator
{
	private static $EARTH_RADIUS = 6371;

	protected $pointAlat;
	protected $pointAlon;
	protected $pointBlat;
	protected $pointBlon;

	public function pointA( $lat, $lon )
	{
		$this->pointAlat = $lat;
		$this->pointAlon = $lon;
	}

	public function pointB( $lat, $lon )
	{
		$this->pointBlat = $lat;
		$this->pointBlon = $lon;
	}

	public function calculate()
	{
		$lat1 = deg2rad($pointAlat);
		$lat2 = deg2rad($pointBlat);
		$lon1 = deg2rad($pointAlon);
		$lon2 = deg2rad($pointBlon);

		$dist = (HaversineImpl::EARTH_RADIUS * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );

		$dist = number_format($dist, 2, '.', '');

		return $dist;
	}
}