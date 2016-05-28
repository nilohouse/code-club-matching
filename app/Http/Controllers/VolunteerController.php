<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Volunteer;

class VolunteerController extends Controller
{
    public function register(Request $request)
    {
    	$volunteer = new Volunteer;
    	$volunteer->name = $request->name;
    	$volunteer->email = $request->email;
    	$volunteer->setBirth($request->birth);
    	$volunteer->zipcode = $request->zipcode;
    	$volunteer->save();

    	return view('thank_you');
    }
}
