<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\TrainingSheet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainingSheets = TrainingSheet::all();

        $data = [
            "trainingSheets"=> $trainingSheets];

        return view('trainingSheets.d-index.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainingSheets.d-create.create');
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
    public function show(TrainingSheet $trainingSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingSheet $trainingSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingSheet $trainingSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingSheet $trainingSheet)
    {
        //
    }
}
