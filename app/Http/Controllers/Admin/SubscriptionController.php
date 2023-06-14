<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Subscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::all();

        $data = ["subscriptions" => $subscriptions];

        return view('subscriptions.d-index.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subscriptions.d-create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'duration' => 'required',
            'price' => 'required'
        ]);

        $subscription = new Subscription();

        $subscription->duration = $request->input('duration');
        $subscription->price = $request->input('price');

        $subscription->save();
        return redirect()->route('subscriptions.index')->with('Successo', 'Abbonamento creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        return view('subscriptions.d-edit.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'duration' => 'required',
            'price' => 'required'
        ]);

        $subscription->duration = $request->input('duration');
        $subscription->price = $request->input('price');
        $subscription->save();

        return redirect()->route('subscriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('subscriptions.index')->with('success', 'Abbonamento eliminato con successo');
    }
}
