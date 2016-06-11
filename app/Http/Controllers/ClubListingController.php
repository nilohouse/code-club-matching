<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Helpers\Contracts\CodeClubBRContract;

class ClubListingController extends Controller
{
	protected $codeClub;

	public function __construct(CodeClubBRContract $codeClub)
	{
		$this->codeClub = $codeClub;
	}

	public function listAll(Request $request)
    {
    	return response()->json($this->codeClub->listClubs());
    }
}
