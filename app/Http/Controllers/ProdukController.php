<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:200',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_id = $request->kategori;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->is_laris = $request->has('is_laris');

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/produk', $nama);
            $produk->gambar = $nama;
        }

        // Handle slide images
        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile('slide' . $i)) {
                $file = $request->file('slide' . $i);
                $nama = 'slide' . $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/produk', $nama);
                $produk->{'slide' . $i} = $nama;
            }
        }

        $produk->save();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:200',
            'kategori' => 'required',
            'harga' => 'required|integer',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_id = $request->kategori;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->is_laris = $request->has('is_laris');

        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($produk->gambar && file_exists(public_path('upload/produk/' . $produk->gambar))) {
                unlink(public_path('upload/produk/' . $produk->gambar));
            }
            
            $file = $request->file('gambar');
            $nama = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/produk', $nama);
            $produk->gambar = $nama;
        }

        // Handle slide images
        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile('slide' . $i)) {
                // Delete old slide
                if ($produk->{'slide' . $i} && file_exists(public_path('upload/produk/' . $produk->{'slide' . $i}))) {
                    unlink(public_path('upload/produk/' . $produk->{'slide' . $i}));
                }
                
                $file = $request->file('slide' . $i);
                $nama = 'slide' . $i . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move('upload/produk', $nama);
                $produk->{'slide' . $i} = $nama;
            }
        }

        $produk->save();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        
        // Delete images
        if ($produk->gambar && file_exists(public_path('upload/produk/' . $produk->gambar))) {
            unlink(public_path('upload/produk/' . $produk->gambar));
        }
        
        for ($i = 1; $i <= 3; $i++) {
            if ($produk->{'slide' . $i} && file_exists(public_path('upload/produk/' . $produk->{'slide' . $i}))) {
                unlink(public_path('upload/produk/' . $produk->{'slide' . $i}));
            }
        }
        
        $produk->delete();

return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
    }
}

