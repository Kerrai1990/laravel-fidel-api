<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FidelAPI\FidelAPI;
use Illuminate\Support\Facades\Cache;

class LocationController extends Controller
{

    protected $api;

    public function __construct()
    {
        $this->middleware('auth');
        $this->api = app(FidelAPI::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Cache::forget("superadmin_locations_".$id);
        if (Cache::get('superadmin_locations_'.$id)) {
            $locations = Cache::get('superadmin_locations_'.$id);
        } else {
            $locations = $this->api->call("locations/".$id);

            if ($locations) {
                $locations = $locations->items();
            }

            Cache::put('superadmin_locations_'.$id, $locations, 10);
        }

        return view('admin.locations.show')
            ->with('locations', $locations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
