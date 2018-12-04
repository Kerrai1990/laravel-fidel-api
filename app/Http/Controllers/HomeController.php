<?php

namespace App\Http\Controllers;

use FidelAPI\FidelAPI;
use FidelAPI\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function __construct()
    {
        $api = app(FidelAPI::class);

        $programs = $api->call("programs/78fdee70-e611-4c24-a30d-5a57346cf4de/cards");
        $location = $api->call('locations/55a6b549-f17e-4722-af76-44d966e0e853');
        $brands = $api->call('brands/646468a6-d3c0-454f-8f6d-937bd34046cc');
        $cards = $api->call('cards/1c40f9d9-8526-492b-8b32-ac5c7e561a68');
        dump($programs);
        dump($location);
        dump($brands);
        dd($cards);
    }
}
