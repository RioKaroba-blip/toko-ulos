<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = collect([]);
        $kategori = collect([]);

        try {
            $produk = \App\Models\Product::with('kategori')->get();
            $kategori = \App\Models\Kategori::all();
        } catch (\Exception $e) {}

        return view('admin.produk.index', compact('produk', 'kategori'));
    }

    public function create()
    {
        $kategori = collect([]);
        try {
            $kategori = \App\Models\Kategori::all();
        } catch (\Exception $e) {}

        return view('admin.produk.tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_id' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambah!');
    }

    public function edit($id)
    {
        $kategori = collect([]);
        $produk = null;

        try {
            $produk = \App\Models\Product::findOrFail($id);
            $kategori = \App\Models\Kategori::all();
        } catch (\Exception $e) {}

        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function laris()
    {
        $produk = collect([]);
        $produkLaris = collect([]);

        try {
            $produk = \App\Models\Product::all();
            $produkLaris = \App\Models\Product::where('is_laris', 1)->get();
        } catch (\Exception $e) {}

        return view('admin.produk.laris', compact('produk', 'produkLaris'));
    }

    public function tambahLaris(Request $request)
    {
        return redirect()->route('admin.produk.laris')->with('success', 'Produk laris berhasil ditambah!');
    }

    public function hapusLaris($id)
    {
        return redirect()->route('admin.produk.laris')->with('success', 'Produk laris berhasil dihapus!');
    }
}