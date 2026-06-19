<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoAdminController extends Controller
{
    // TAMPILKAN SEMUA PROMO (PASTIKAN DATA SELALU FRESH)
    public function index()
    {
        $promos = Promo::orderBy('created_at', 'desc')->get();
        return view('admin.promo', compact('promos'));
    }

    // SIMPAN PROMO BARU
    public function store(Request $request)
    {
        $request->validate([
            'judul_promo'     => 'required|string|max:255',
            'diskon_persen'   => 'required|integer|min:1|max:100',
            'tanggal_mulai'   => 'required|required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi'       => 'required|string',
            'gambar'          => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $file = $request->file('gambar');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('promos', $filename, 'public');

        Promo::create([
    'judul_promo'     => $request->judul_promo,
    'diskon_persen'   => $request->diskon_persen,
    'tanggal_mulai'   => $request->tanggal_mulai,
    'tanggal_selesai' => $request->tanggal_selesai,
    'deskripsi'       => $request->deskripsi,
    'gambar'          => $filename,
    'is_active'       => true,
]);
        return redirect()
            ->route('admin.promo')
            ->with('success', 'Promo berhasil ditambahkan!');
    }

    // TOGGLE STATUS — LANGSUNG REFRESH HALAMAN
    public function toggle(Promo $promo)
    {
        $promo->is_active = !$promo->is_active;
        $promo->save();

        return back()->with('success', 'Status promo berhasil diubah!');
    }

    // HAPUS PROMO — PASTI HILANG DARI LIST + GAMBAR TERHAPUS
    public function destroy(Promo $promo)
    {
        // Hapus gambar dari folder storage
        if ($promo->gambar && Storage::disk('public')->exists('promos/' . $promo->gambar)) {
            Storage::disk('public')->delete('promos/' . $promo->gambar);
        }

        $promo->delete();

        return back()->with('success', 'Promo berhasil dihapus dan tidak akan muncul lagi!');
    }
}