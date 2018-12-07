<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FidelAPI\FidelAPI;
use Illuminate\Support\Facades\Cache;

class ProgramController extends Controller
{

    protected  $api;

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
        if(Cache::get('superadmin_programs')) {
            $programs = Cache::get('superadmin_programs');
        } else {
            $programs = $this->api->call("programs");

            if($programs) {
                $programs = $programs->items();
            }

            foreach($programs as $key => $index) {
                $locations = $this->api->call("programs/".$index->id."/locations");
                if($locations) {
                    $programs[$key]->locations = $locations->items();
                }
            }
            Cache::put('superadmin_programs', $programs, 10);
        }

        return view('admin.programs.index')
            ->with('programs', $programs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
