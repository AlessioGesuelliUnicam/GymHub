<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Diet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diets = Diet::all();

        $data = [
            "diets"=> $diets];

        return view('diets.d-index.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('diets.d-create.create');
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
    public function show(Diet $diet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diet $diet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diet $diet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diet $diet)
    {
        //
    }
}
