<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\ClientSubscription;
use App\Models\Diet;
use App\Models\TrainingSheet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class  ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        $data = [
            "clients" => $clients];

        return view('clients.d-index.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.d-create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'surname' => 'required|max:30',
            'phone_number' => 'required|max:11',
            'CF' => 'required|max:16'
        ]);

        $client = new Client();

        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->birth_date = $request->input('birth_date');
        $client->city_residence = $request->input('city_residence');
        $client->address_residence = $request->input('address_residence');
        $client->phone_number = $request->input('phone_number');
        $client->email = $request->input('email');
        $client->med_cert = $request->input('med_cert');
        $client->med_cert_exp = $request->input('med_cert_exp');
        $client->free_entry = $request->input('free_entry');
        $client->CF = $request->input('CF');

        $client->save();

        return redirect()->route('clients.index')->with('Successo', 'Cliente creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $data = [
            'client' => $client
        ];

        return view('clients.d-edit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|max:20',
            'surname' => 'required|max:30',
            'phone_number' => 'required|max:11',
            'CF' => 'required|max:16'
        ]);

        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->birth_date = $request->input('birth_date');
        $client->city_residence = $request->input('city_residence');
        $client->address_residence = $request->input('address_residence');
        $client->phone_number = $request->input('phone_number');
        $client->email = $request->input('email');
        $client->med_cert = $request->input('med_cert');
        $client->med_cert_exp = $request->input('med_cert_exp');
        $client->free_entry = $request->input('free_entry');
        $client->CF = $request->input('CF');

        $client->save();

        return redirect()->route('clients.index')->with('Successo', 'Cliente salvato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        ClientSubscription::where('client_id', $client->id)->delete();
        Diet::where('client_id', $client->id)->delete();
        TrainingSheet::where('client_id', $client->id)->delete();
        $client->delete();


        return redirect()->route('clients.index')->with('Successo', 'Cliente eliminato con successo');
    }
}
