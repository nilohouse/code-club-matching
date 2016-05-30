<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Volunteer;
use App\VolunteerPending;
use App\VolunteerMailData;

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
    	//TODO: Recuperar token de cadastro, removê-lo e atualizar flag de confirmação na tabela de voluntários

    	return view('thank_you');
    }
}
