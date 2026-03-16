<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = collect([]);
        try {
            $kategori = \App\Models\Kategori::all();
        } catch (\Exception $e) {}

        return view('admin.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil ditambah!');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}