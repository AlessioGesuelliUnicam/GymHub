<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\ClientSubscription;
use App\Models\Diet;
use App\Http\Controllers\Controller;
use App\Models\TrainingSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diets = Diet::all();

        $data = [
            "diets" => $diets,
            "clients" => []
        ];

        foreach ($diets as $diet) {
            $clients = DB::table('clients')
                ->where('id', $diet->client_id)
                ->select('name', 'surname')
                ->get();

            foreach ($clients as $client) {
                $data['clients'][] = [
                    'name' => $client->name,
                    'surname' => $client->surname,
                ];
            }
        }
        return view('diets.d-index.index', compact('data', 'diets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = DB::table('clients')
            ->select('id', 'name', 'surname')
            ->get();

        return view('diets.d-create.create', ['clients' => $clients]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'diet' => 'required',
        ]);

        $diets = new Diet();

        $diets->client_id =  explode(' ',$request->input('client_id'))[0];
        $diets->diet = $request->input('diet');

        $diets->save();

        return redirect()->route('diets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Diet $diet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diet $diet)
    {
        $clients = DB::table('clients')
            ->select('id', 'name', 'surname')
            ->get();

        $data = [
            "diet" => $diet,
            "clients" => $clients
        ];

        return view('diets.d-edit.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diet $diet)
    {

        var_dump($request->input('client_id'));

        $request->validate([

            'client_id' => 'required',
            'diet' => 'required',

        ]);

        $diet->client_id = $request->input('client_id');
        $diet->diet = $request->input('diet');

        $diet->save();

        return redirect()->route('diets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diet $diet)
    {

        $diet->delete();


        return redirect()->route('diets.index');

    }
}
