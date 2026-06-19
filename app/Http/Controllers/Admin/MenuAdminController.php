<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuAdminController extends Controller
{
    private $path = 'images/menus';

    public function index()
    {
        $menus = Menu::latest()->get();
        return view('admin.menu', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('gambar');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path($this->path), $namaFile);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'gambar'    => $namaFile,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return back()->with('success', 'Menu berhasil ditambahkan!');
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'nullable',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'nama_menu' => $request->nama_menu,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            if ($menu->gambar && file_exists(public_path($this->path . '/' . $menu->gambar))) {
                unlink(public_path($this->path . '/' . $menu->gambar));
            }
            $file = $request->file('gambar');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($this->path), $namaFile);
            $data['gambar'] = $namaFile;
        }

        $menu->update($data);
        return back()->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->gambar && file_exists(public_path($this->path . '/' . $menu->gambar))) {
            unlink(public_path($this->path . '/' . $menu->gambar));
        }
        $menu->delete();
        return back()->with('success', 'Menu berhasil dihapus!');
    }

    public function edit(Menu $menu)
    {
        return response()->json($menu);
    }

    public function toggle(Menu $menu)
    {
        $menu->update(['is_active' => !$menu->is_active]);
        return back()->with('success', 'Status menu berhasil diubah!');
    }
}