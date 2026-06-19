<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $admin = Admin::where('username', $request->username)->first();

    if (!$admin) {
        return back()->with('error', 'Username tidak ditemukan');
    }

    // INI YANG HARUS DIGANTI → PAKAI Hash::check()
    if (!Hash::check($request->password, $admin->password)) {
        return back()->with('error', 'Password salah');
    }

    // Simpan session
    session(['admin_id' => $admin->id]);   // BUKAN id_admin → karena tabel users pakai 'id'

    return redirect()->route('admin.dashboard');
}
    public function logout()
    {
        session()->forget('admin_id');
        return redirect('/admin/login');
    }
}
