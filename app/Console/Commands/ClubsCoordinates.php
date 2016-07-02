<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Helpers\Contracts\CodeClubBRContract;

use App\ClubCoordinates;

use Vinelab\Http\Client as HttpClient;

class ClubsCoordinates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clubs:coordinates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports club coordinates from Google Maps API';

    protected $codeClub;
    protected $httpClient;
    protected static $GMAPS_URL = "maps.googleapis.com/maps/api/geocode/json";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CodeClubBRContract $codeClub, HttpClient $client)
    {
        parent::__construct();
        $this->codeClub = $codeClub;
        $this->httpClient = $client;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $clubs = $this->codeClub->listClubs();
        
        foreach ($clubs as $club)
        {
            if ($club->zipCode != null)
            {
                $request = [
                    'url' => ClubsCoordinates::$GMAPS_URL,
                    'params' => [
                        'address' => $club->zipCode
                    ]
                ];

                $response = $this->httpClient->get($request);

                if ( sizeof($response->json()->results) > 0 ) {
                    $lat = $response->json()->results[0]->geometry->location->lat;
                    $lng = $response->json()->results[0]->geometry->location->lng;

                    $club_hash = spl_object_hash($club);
                    echo $club->zipCode ."(". $lat ." / ". $lng .") - ". $club_hash ."\n";
                    $clubCoordinates = new ClubCoordinates;
                    $clubCoordinates->club_hash = $club_hash;
                    $clubCoordinates->name = $club->name;
                    $clubCoordinates->admin = $club->admin;
                    $clubCoordinates->zipcode = $club->zipCode;
                    $clubCoordinates->address = $club->address;
                    $clubCoordinates->lat = doubleval($lat);
                    $clubCoordinates->lng = doubleval($lng);
                    $clubCoordinates->save();
                } else {
                    echo "Not found -> ". $club->zipCode ."\n";
                }//-22.7883436 / -42.1375086
            }
        }
    }
}
