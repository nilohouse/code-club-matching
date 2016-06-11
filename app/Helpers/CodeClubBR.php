<?php

namespace App\Helpers;

use App\Helpers\Contracts\CodeClubBRContract;

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
		return $this->httpClient->get($request)->json();
	}
}