<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

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
            'harga'       => 'required|numeric',
            'deskripsi'   => 'required|string',
        ]);

        $data = [
            'nama_produk' => $request->nama_produk,
            'kategori_id' => $request->kategori_id,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'is_laris'    => $request->has('is_laris') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/produk'), $filename);
            $data['gambar'] = $filename;
        }
        if ($request->hasFile('slide1')) {
            $file = $request->file('slide1');
            $filename = time().'_slide1_'.$file->getClientOriginalName();
            $file->move(public_path('upload/produk'), $filename);
            $data['slide1'] = $filename;
        }
        if ($request->hasFile('slide2')) {
            $file = $request->file('slide2');
            $filename = time().'_slide2_'.$file->getClientOriginalName();
            $file->move(public_path('upload/produk'), $filename);
            $data['slide2'] = $filename;
        }
        if ($request->hasFile('slide3')) {
            $file = $request->file('slide3');
            $filename = time().'_slide3_'.$file->getClientOriginalName();
            $file->move(public_path('upload/produk'), $filename);
            $data['slide3'] = $filename;
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
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
            'is_laris'    => $request->has('is_laris') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/produk'), $filename);
            $data['gambar'] = $filename;
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
