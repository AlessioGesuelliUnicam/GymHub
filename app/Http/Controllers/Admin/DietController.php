<?php

namespace App\Http\Controllers\Admin;

use App\Models\Diet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'diet' => 'required|file',
        ]);

        $diets = new Diet();
        $clientInfo = explode(' ', $request->input('client_id'));
        $diets->client_id = $clientInfo[0];
        $clientName = Str::slug($clientInfo[1].'_'.$clientInfo[2]); // Genera un nome univoco basato sul nome e cognome del cliente

        if ($request->hasFile('diet')) {
            $file = $request->file('diet');
            $extension = $file->getClientOriginalExtension(); // Estensione del file originale
            $fileName = $clientName.'_'.date('Ymd_His').'.'.$extension; // Genera il nome del file univoco con data/ora
            $path = $file->storeAs('file/diete', $fileName, 'public'); // Salva il file rinominato nella directory 'public/file/diete'
            $diets->diet = $path;
        }

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
    {}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diet $diet)
    {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diet $diet)
    {

        $diet->delete();


        return redirect()->route('diets.index');

    }
}
