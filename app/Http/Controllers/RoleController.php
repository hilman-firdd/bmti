<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = role::all();

        return view('admin.role.index', compact('roles'));
    }
    // create store edit update delete
    public function create(){
        return view('admin.role.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'role_name' => 'required|string',
        ]);
        $roles = Role::create([
            'role_name' => $request->role_name
        ]);

        return redirect('/admin/roles')->with('message', 'Data Berhasil Disimpan');

    }
    public function edit($id){
        $roles = Role::find($id);
        return view('admin.role.edit', compact(['roles']));
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'role_name' => 'required|string'
        ]);

        $roles = Role::find($id);
        $roles->update([
            'role_name' => $request->role_name
        ]);

        return redirect('/admin/roles')->with('message', 'Data Berhasil Diubah');
    }
    public function delete($id){
        $roles = Role::find($id);
        $roles->delete();

        return redirect('/admin/roles')->with('message', 'Data Berhasil Dihapus');
    }
}