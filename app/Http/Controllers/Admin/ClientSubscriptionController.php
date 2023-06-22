<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\ClientSubscription;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
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
        $subscriptions = DB::table('subscriptions')->get();
        $clients = DB::table('clients')->select('id','name', 'surname')->get();
        $data = [
            "subscriptions" => $subscriptions,
            "clients" => $clients,
        ];
        return view('clientSubscriptions.d-create.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'cliente' => 'required',
           'subscription' => 'required'

        ]);
        $durata = Subscription::where('name','=',$request->input('subscription'))->value('duration');
        $date = date_create($request->input('start_date'));
        date_modify($date, '+'.$durata.' month');  // Somma mese

        $newDate = date_format($date, 'Y-m-d');

        $clientSubscription = new ClientSubscription();

        $clientSubscription->client_id = explode(' ',$request->input('cliente'))[0];
        $clientSubscription->subscription_id = Subscription::where('name','=',$request->input('subscription'))->value('id');
        $clientSubscription->start_subscription = $request->input('start_date');
        $clientSubscription->end_subscription = $newDate;
        $clientSubscription->save();

        // Esempio di reindirizzamento alla visualizzazione dei dettagli della nuova sottoscrizione
        return redirect()->route('clientSubscriptions.index')
            ->with('success', 'Sottoscrizione creata con successo.');
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
        // Elimina la ClientSubscription dal database
        $clientSubscription->delete();

        // Reindirizza alla pagina index delle clientSubscriptions
        return redirect()->route('clientSubscriptions.index');
    }

}
