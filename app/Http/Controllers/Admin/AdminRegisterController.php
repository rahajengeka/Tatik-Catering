<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminRegisterController extends Controller
{
   public function store(Request $request)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'username'     => 'required|string|max:255|unique:users,username',
        'password'     => 'required|min:6',
    ]);

    Admin::create([
        'username'     => $request->username,
        'nama_lengkap' => $request->nama_lengkap,
        'name'         => $request->nama_lengkap,           // kolom name wajib ada
        'email'        => $request->username . '@admin.com', // dummy email
        'password'     => Hash::make($request->password),   // PASTI HASH!
    ]);

    // JANGAN login otomatis → langsung ke login + pesan sukses
    return redirect()->route('admin.login')
        ->with('success', 'Admin berhasil terdaftar! Silakan login dengan username dan password yang baru dibuat.');
}
}