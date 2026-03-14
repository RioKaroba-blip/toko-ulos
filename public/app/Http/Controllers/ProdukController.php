<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:200',
            'kategori' => 'required|exists:kategori,id',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slide1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slide2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slide3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_laris' => 'boolean',
        ]);

        $validated['kategori_id'] = $validated['kategori'];
        $validated['is_laris'] = $request->has('is_laris');
        unset($validated['kategori']);

        $produk = new Produk();
        $produk->fill($validated);

        // Handle main image
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $nama = time() . '.' . $extension;
            Storage::disk('public')->putFileAs('produk', $file, $nama);
            $produk->gambar = $nama;
        }

        // Handle slide images
        for ($i = 1; $i <= 3; $i++) {
            $slideKey = 'slide' . $i;
            if ($request->hasFile($slideKey)) {
                $file = $request->file($slideKey);
                $extension = $file->getClientOriginalExtension();
                $nama = $slideKey . '_' . time() . '.' . $extension;
                Storage::disk('public')->putFileAs('produk', $file, $nama);
                $produk->{$slideKey} = $nama;
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
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:200',
            'kategori' => 'required|exists:kategori,id',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slide1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slide2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slide3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_laris' => 'boolean',
        ]);

        $produk = Produk::findOrFail($id);

        $validated['kategori_id'] = $validated['kategori'];
        $validated['is_laris'] = $request->has('is_laris');
        unset($validated['kategori']);

        $produk->fill($validated);

        // Handle main image
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($produk->gambar) {
                Storage::disk('public')->delete('produk/' . $produk->gambar);
            }
            
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $nama = time() . '.' . $extension;
            Storage::disk('public')->putFileAs('produk', $file, $nama);
            $produk->gambar = $nama;
        }

        // Handle slide images
        for ($i = 1; $i <= 3; $i++) {
            $slideKey = 'slide' . $i;
            if ($request->hasFile($slideKey)) {
                // Delete old slide
                if ($produk->{$slideKey}) {
                    Storage::disk('public')->delete('produk/' . $produk->{$slideKey});
                }
                
                $file = $request->file($slideKey);
                $extension = $file->getClientOriginalExtension();
                $nama = $slideKey . '_' . time() . '.' . $extension;
                Storage::disk('public')->putFileAs('produk', $file, $nama);
                $produk->{$slideKey} = $nama;
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
        if ($produk->gambar) {
            Storage::disk('public')->delete('produk/' . $produk->gambar);
        }
        
        for ($i = 1; $i <= 3; $i++) {
            $slideKey = 'slide' . $i;
            if ($produk->{$slideKey}) {
                Storage::disk('public')->delete('produk/' . $produk->{$slideKey});
            }
        }
        
        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus');
    }
}

