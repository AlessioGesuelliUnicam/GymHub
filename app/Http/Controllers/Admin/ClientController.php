<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();

        $data = [
            "clients" => $clients
        ];

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
            'CF' => 'required|max:16',
        ]);

        $client = new Client();

        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->birth_date = $request->input('birth_date');
        $client->city_residence = $request->input('city_residence');
        $client->address_residence = $request->input('address_residence');
        $client->phone_number = $request->input('phone_number');
        $client->email = $request->input('email');

        if ($request->hasFile('med_cert')) {
            $file = $request->file('med_cert');
            $fileName = $client->name . '_' . $client->surname . '_' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension();
            $filePath = 'file/med_cert/' . $fileName;
            $file->storeAs('public', $filePath);

            $client->med_cert = $filePath;
        }

        $client->med_cert_exp = $request->input('med_cert_exp');
        $client->free_entry = $request->input('free_entry');
        $client->CF = $request->input('CF');

        $client->save();

        return redirect()->route('clients.index');
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

        if ($request->hasFile('med_cert')) {
            $file = $request->file('med_cert');
            $fileName = $client->name . '_' . $client->surname . '_' . now()->format('Ymd_His') . '.' . $file->getClientOriginalExtension();
            $filePath = 'file/med_cert/' . $fileName;
            $file->storeAs('public', $filePath);

            $client->med_cert = $filePath;
        }

        $client->med_cert_exp = $request->input('med_cert_exp');
        $client->free_entry = $request->input('free_entry');
        $client->CF = $request->input('CF');

        $client->save();

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        DB::table('client_subscriptions')->where('client_id', $client->id)->delete();
        DB::table('diets')->where('client_id', $client->id)->delete();
        DB::table('training_sheets')->where('client_id', $client->id)->delete();
        $client->delete();

        return redirect()->route('clients.index');
    }
}
