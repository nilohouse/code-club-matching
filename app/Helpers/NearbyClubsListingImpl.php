<?php

namespace App\Helpers;

use Log;
use Cache;

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
                'address' => $zipcode . ", Brasil"
            ]
        ];

        if (Cache::has('ccbr_clubs'))
        {
        	$response = Cache::get('ccbr_clubs');
        	Log::info('Read from cache');
        }
        else
        {
        	$response = $this->httpClient->get($request);
        	Cache::forever('ccbr_clubs', $response);
        	Log::info('Updating cache');
        }

        if ( sizeof($response->json()->results) > 0 )
        {
            $lat = $response->json()->results[0]->geometry->location->lat;
            $lng = $response->json()->results[0]->geometry->location->lng;
            $this->distanceCalculator->pointA($lat, $lng);

			foreach ( ClubsCoordinates::all() as $club )
			{
				$this->distanceCalculator->pointB($club->lat, $club->lng);

				$distance = $this->distanceCalculator->calculate();

				if ($distance <= 50)
				{
					$club->distance = $distance;
					Log::info('Club nearby '. $distance);
					array_push($clubsNearby, $club);
				}
				else
				{
					Log::info($distance . ": club too far (skipping ". $club->zipcode .")");
				}
			}
		}

		return $clubsNearby;
	}
}