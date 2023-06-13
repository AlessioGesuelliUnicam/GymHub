<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();

        $data = [
            "staff" => $staff,
            "roles" => []
        ];

        foreach ($staff as $staffMember) {
            $role = DB::table('roles')->where('id', $staffMember->id_role)->value('type');
            $data['roles'][] = $role;
        }


        return view('staff.d-index.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        $data = [
            "roles" => $roles];
        return view('staff.d-create.create', $data);
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
            'roles'  => 'required',
        ]);

        $staff = new Staff();

        $staff->name = $request->input('name');
        $staff->surname = $request->input('surname');
        $staff->birth_date = $request->input('birth_date');
        $staff->city_residence = $request->input('city_residence');
        $staff->address_residence = $request->input('address_residence');
        $staff->phone_number = $request->input('phone_number');
        $staff->email = $request->input('email');
        $staff->id_role = Role::where('type','like',$request->input('roles'))->value('id');

        $staff->save();

        return redirect()->route('staff.index')->with('Successo', 'Membro dello staff creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $roles = DB::table('roles')->get();
        $data = [
            "staff" => $staff,
            "roles" => $roles
        ];
        return view('staff.d-edit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|max:20',
            'surname' => 'required|max:30',
            'phone_number' => 'required|max:11',
            'roles'  => 'required',
        ]);

        $staff->name = $request->input('name');
        $staff->surname = $request->input('surname');
        $staff->birth_date = $request->input('birth_date');
        $staff->city_residence = $request->input('city_residence');
        $staff->address_residence = $request->input('address_residence');
        $staff->phone_number = $request->input('phone_number');
        $staff->email = $request->input('email');
        $staff->id_role = Role::where('type', 'like', $request->input('roles'))->value('id');

        $staff->save();

        return redirect()->route('staff.index')->with('Successo', 'Membro dello staff aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')->with('Successo', 'Membro dello staff eliminato con successo');
    }
}
