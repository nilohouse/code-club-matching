<?php

namespace App\Helpers\Contracts;

interface NearbyClubsListingContract
{
	public function listClubsNearby( $zipcode );
}