<?php

namespace App\Helpers;

use App\Helpers\Contracts\CodeClubBRContract;
use App\ClubDetail;

use Vinelab\Http\Client as HttpClient;

class CodeClubBR implements CodeClubBRContract
{
	private $httpClient;

	public function __construct(HttpClient $client)
	{
		$this->httpClient = $client;
	}

	public function listClubs()
	{
		$request = [
			'url' => 'voluntarios.codeclubbrasil.org/api-ccbr-clubs-json.php'
		];

		$clubList = $this->httpClient->get($request)->json()->clubs;
		$list = array();
		
		foreach ($clubList as $club) {
			$clubDetail = new ClubDetail;
			$clubDetail->name = $club->venue->name;
			$clubDetail->admin = $club->contact->name;
			$clubDetail->zipCode = $club->venue->address->postcode;
			$clubDetail->address = $club->venue->address->address_1 . 
									$club->venue->address->address_2;
			
			array_push($list, $clubDetail);
		}

		return $list;
	}

	public function getHttpClient()
	{
		return $this->httpClient;
	}
}