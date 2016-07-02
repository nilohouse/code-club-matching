<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Volunteer;
use App\VolunteerPending;
use App\VolunteerMailData;
use App\Helpers\Contracts\NearbyClubsListingContract as NearbyClubListing;

class VolunteerController extends Controller
{
    protected $nearbyClubListing;

    public function __construct(NearbyClubListing $nearbyClubListing)
    {
        $this->nearbyClubListing = $nearbyClubListing;
    }

    public function register(Request $request)
    {
    	$volunteer = new Volunteer;
    	$volunteer->name = $request->name;
    	$volunteer->email = $request->email;
    	$volunteer->setBirth($request->birth);
    	$volunteer->zipcode = $request->zipcode;
    	$volunteer->save();

    	$pending = new VolunteerPending;
    	$pending->volunteer_id = $volunteer->id;
    	$pending->token = uniqid('CC_BR');
    	$pending->save();

    	$mailData = new VolunteerMailData;
    	$mailData->email = $volunteer->email;
    	$mailData->name = $volunteer->name;
    	$mailData->token = $pending->token;

    	Mail::send('emails.welcome', ['mailData' => $mailData], function($message) use ($mailData) {
    		$message->from('voluntarios@codeclubbrasil.org', 'Code Club Brasil');
    		$message->to($mailData->email);
    	});

    	return view('pending');
    }

    public function confirm(Request $request)
    {
    	$token = $request->token;
		$pendingRegistration = VolunteerPending::where('token', $token)->firstOrFail();

		Volunteer::where('id', $pendingRegistration->volunteer_id)
				 ->update(['confirmed' => 1]);

		VolunteerPending::where('token', $token)->delete();

		return view('thank_you');
    }

    public function selfService(Request $request)
    {
        return view('self_service');
    }

    public function showClubsNearby(Request $request)
    {
        $zipCode = $request->zipCode;
        $clubsNearby = $this->nearbyClubListing->listClubsNearby($zipCode);
        
        return view('clubs_nearby', ['zipCode' => $zipCode, 'clubsNearby' => $clubsNearby]);
    }
}
