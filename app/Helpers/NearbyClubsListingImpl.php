<?php

namespace App\Helpers;

use Log;

use App\Helpers\Contracts\NearbyClubsListingContract;
use App\Helpers\Contracts\DistanceCalculatorContract as DistanceCalculator;

use App\ClubCoordinates as ClubsCoordinates;

use Vinelab\Http\Client as HttpClient;

class NearbyClubsListingImpl implements NearbyClubsListingContract
{
	protected static $GMAPS_URL = "maps.googleapis.com/maps/api/geocode/json";

	private $distanceCalculator;
	private $httpClient;

	public function __construct(DistanceCalculator $distanceCalculator, HttpClient $httpClient)
	{
		$this->distanceCalculator = $distanceCalculator;
		$this->httpClient = $httpClient;
	}

	public function listClubsNearby($zipcode)
	{
		$clubsNearby = array();
		$request = [
            'url' => NearbyClubsListingImpl::$GMAPS_URL,
            'params' => [
                'address' => $zipcode
            ]
        ];

        $response = $this->httpClient->get($request);

        if ( sizeof($response->json()->results) > 0 )
        {
            $lat = $response->json()->results[0]->geometry->location->lat;
            $lng = $response->json()->results[0]->geometry->location->lng;
            $this->distanceCalculator->pointA($lat, $lng);

			foreach ( ClubsCoordinates::all() as $club )
			{
				$this->distanceCalculator->pointB($club->lat, $club->lng);

				$distance = $this->distanceCalculator->calculate();

				if ($distance <= 40)
				{
					array_push($clubsNearby, $club);
				}
				else
				{
					Log::info($distance . ": club too far (skipping)");
				}
			}
		}

		return $clubsNearby;
	}
}