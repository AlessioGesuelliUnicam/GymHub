<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        $data = [
            "roles" => $roles];

        return view('roles.d-index.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.d-create.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name_roles' => 'required|max:50',
            ]);

            $roles = new Role();

            $roles->type = $request->input('name_roles');
            $roles->save();

            return redirect()->route('roles.index')->with('Successo', 'Ruolo creato con successo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $data = [
            'role' => $role
        ];

        return view('roles.d-edit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name_roles' => 'required|max:50',
        ]);
        $role->type = $request->input('name_roles');
        $role->save();

        return redirect()->route('roles.index')->with('Successo', 'Ruolo salvato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if (Staff::where('id_role', $role->id )->exists()) {
            return redirect()->route('roles.index')->with('Fallimento', 'Ruolo impossibile da eliminare, modificare ruolo dei componenti dello staff');
        } else {
            $role->delete();
            return redirect()->route('roles.index')->with('Successo', 'Ruolo eliminato con successo');
        }

    }


}
