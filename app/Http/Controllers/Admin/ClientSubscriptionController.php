<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClientSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientSubscriptions = ClientSubscription::all();

        $data = [
            "clientSubscriptions" => $clientSubscriptions,
            "clients" => []
        ];

        foreach ($clientSubscriptions as $clientSubscriptionRow) {
            $clients = DB::table('clients')
                ->where('id', $clientSubscriptionRow->client_id)
                ->select('name', 'surname')
                ->get();

            foreach ($clients as $client) {
                $data['clients'][] = [
                    'name' => $client->name,
                    'surname' => $client->surname,
                ];
            }
        }

        return view('clientSubscriptions.d-index.index', compact('data', 'clientSubscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientSubscriptions.d-create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientSubscription $clientSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientSubscription $clientSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientSubscription $clientSubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientSubscription $clientSubscription)
    {
        //
    }
}
