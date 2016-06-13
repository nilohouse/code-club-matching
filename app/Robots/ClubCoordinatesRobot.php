<?php

namespace App\Robots;

use App\Helpers\Contracts\CodeClubBRContract;

use Vinelab\Http\Client as HttpClient;

class ClubCoordinatesRobot
{
	protected $codeClub;
	protected $httpClient;
	protected static $GMAPS_URL = "maps.googleapis.com/maps/api/geocode/json";

	public function __construct(CodeClubBRContract $codeClub, HttpClient $client)
	{
		$this->codeClub = $codeClub;
		$this->httpClient = $client;
	}

	public function run()
	{
		$clubs = $this->codeClub->listClubs();
		
		foreach ($clubs as $club)
		{
			if ($club->address != null)
			{
				$request = [
					'url' => ClubCoordinatesRobot::$GMAPS_URL,
					'params' => [
						'address' => $club->address
					]
				];

				$response = $this->httpClient->get($request);

				foreach ( $response->json()->results as $mapOutput )
				{
					echo $mapOutput->geometry->location->lat . " / ".
					$mapOutput->geometry->location->lng;
				}
			}
		}
	}
}