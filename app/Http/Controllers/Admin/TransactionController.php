<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FidelAPI\FidelAPI;
use Illuminate\Support\Facades\Cache;

class TransactionController extends Controller
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
        return view('admin.transactions.index');
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
        Cache::forget("superadmin_transactions_".$id);
        if (Cache::get('superadmin_transactions_'.$id)) {
            $transactions = Cache::get('superadmin_transactions_'.$id);
        } else {
            $transactions = $this->api->call("programs/".$id."/transactions");

            if ($transactions) {
                $transactions = $transactions->items();
            }

            Cache::put('superadmin_transactions_'.$id, $transactions, 10);
        }

        return view('admin.transactions.show')
            ->with('transactions', $transactions);
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
