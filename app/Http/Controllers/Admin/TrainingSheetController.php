<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\ClientSubscription;
use App\Models\Diet;
use App\Models\TrainingSheet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $training_sheets = TrainingSheet::all();

        $data = [
            "training_sheets" => $training_sheets,
            "clients" => []
        ];

        foreach ($training_sheets as $training_sheetsRow) {
            $clients = DB::table('clients')
                ->where('id', $training_sheetsRow->client_id)
                ->select('name', 'surname')
                ->get();

            foreach ($clients as $client) {
                $data['clients'][] = [
                    'name' => $client->name,
                    'surname' => $client->surname,
                ];
            }
        }

        return view('trainingSheets.d-index.index', compact('data', 'training_sheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = DB::table('clients')->select('id', 'name', 'surname')->get();
        return view('trainingSheets.d-create.create', ['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $training_sheets = TrainingSheet::all();

        $data = [
            "training_sheets" => $training_sheets,
            "clients" => []
        ];

        foreach ($training_sheets as $training_sheet) {
            $clients = DB::table('clients')
                ->where('id', $training_sheet->client_id)
                ->select('name', 'surname')
                ->get();

            foreach ($clients as $client) {
                $data['clients'][] = [
                    'name' => $client->name,
                    'surname' => $client->surname,
                ];
            }
        }

        return view('trainingSheets.d-index.index', compact('data'));


    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingSheet $training_sheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingSheet $training_sheet)
    {
        $data = [
            'training_sheets' => $training_sheet
        ];

        return view('trainingSheets.d-edit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingSheet $training_sheet)
    {
        var_dump($request->input('client_id'));

        $request->validate([

            'client_id' => 'required',
            'training_sheets' => 'required',

        ]);

        $training_sheet->client_id = $request->input('client_id');
        $training_sheet->training_sheet = $request->input('training_sheet');

        $training_sheet->save();

        return redirect()->route('trainingSheets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingSheet $training_sheet)
    {
        $training_sheet->delete();
        return redirect()->route('trainingSheets.index');

    }
}
