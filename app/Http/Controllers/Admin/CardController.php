<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FidelAPI\FidelAPI;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CardController extends Controller
{

    protected  $api;

    public function __construct()
    {
        $this->middleware('auth');
        $this->api = app(FidelAPI::class);
    }

    public function cardLinked(Request $request)
    {
        Log::info('here');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cache::get('superadmin_cards')) {
            $cards = Cache::get('superadmin_cards');
        } else {
            $cards = $this->api->call("cards");

            if($cards) {
                $cards = $cards->items();
            }

            Cache::put('superadmin_cards', $cards, 10);
        }

        return view('admin.cards.index')
            ->with('cards', $cards);
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
