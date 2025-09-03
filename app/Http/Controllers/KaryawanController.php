<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(){
        $data = User::where('role', 'User')->paginate(5);
        return view('admin.karyawan.index', compact('data'));
    }
    public function create(Request $request)
{
    $data = User::create([
        'first_name' => $request->input('first_name'),
        'last_name'  => $request->input('last_name'),
        'email'      => $request->input('email'),
        'password'   => Hash::make($request->input('password')), 
        'role' => 'user'
    ]);
$data->save();
    return redirect()->back()->with('success', 'Berhasil menambahkan data');
}
}
