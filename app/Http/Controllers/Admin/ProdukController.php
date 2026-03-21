<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = collect([]);
        $kategori = collect([]);
        try {
            $produk = Produk::with('kategori')->get();
            $kategori = Kategori::all();
        } catch (\Exception $e) {}
        return view('admin.produk.index', compact('produk', 'kategori'));
    }

    public function create()
    {
        $kategori = collect([]);
        try {
            $kategori = Kategori::all();
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

        $data = [
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'is_laris' => $request->has('is_laris') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }
        if ($request->hasFile('slide1')) {
            $data['slide1'] = $request->file('slide1')->store('produk', 'public');
        }
        if ($request->hasFile('slide2')) {
            $data['slide2'] = $request->file('slide2')->store('produk', 'public');
        }
        if ($request->hasFile('slide3')) {
            $data['slide3'] = $request->file('slide3')->store('produk', 'public');
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambah!');
    }

    public function edit($id)
    {
        $produk = null;
        $kategori = collect([]);
        try {
            $produk = Produk::findOrFail($id);
            $kategori = Kategori::all();
        } catch (\Exception $e) {}
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $data = [
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'is_laris' => $request->has('is_laris') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($data);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        Produk::findOrFail($id)->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function laris()
    {
        $produk = collect([]);
        $produkLaris = collect([]);
        try {
            $produk = Produk::all();
            $produkLaris = Produk::where('is_laris', 1)->get();
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