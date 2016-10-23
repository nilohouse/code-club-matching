<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Helpers\Contracts\CodeClubBRContract;
use App\Helpers\Contracts\NearbyClubsListingContract as NearbyClubListing;

class ClubListingController extends Controller
{
	protected $codeClub;

	protected $nearbyClubListing;

	public function __construct(CodeClubBRContract $codeClub, NearbyClubListing $nearbyClubListing)
	{
		$this->codeClub = $codeClub;
		$this->nearbyClubListing = $nearbyClubListing;
	}

	public function listAll(Request $request)
    {
    	return response()->json($this->codeClub->listClubs());
    }

    public function showClubsNearby(Request $request)
    {
        $zipCode = $request->zipCode;
        $clubsNearby = $this->nearbyClubListing->listClubsNearby($zipCode);
        
        return view('clubs_nearby', ['zipCode' => $zipCode, 'clubsNearby' => $clubsNearby]);
    }
}
