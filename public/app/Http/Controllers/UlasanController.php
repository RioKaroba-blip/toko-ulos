<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasan = Ulasan::latest()->get();
        return view('admin.ulasan.index', compact('ulasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ulasan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'ulasan' => 'required|string|max:1000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validated['nama_pengirim'] = $validated['nama'];
        $validated['isi_ulasan'] = $validated['ulasan'];
        $validated['status'] = 'sembunyi';
        unset($validated['nama'], $validated['ulasan']);

        $ulasan = new Ulasan();
        $ulasan->fill($validated);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $nama = time() . '_' . $extension;
            Storage::disk('public')->putFileAs('ulasan', $file, $nama);
            $ulasan->gambar = $nama;
        }

        $ulasan->save();

        return redirect()->back()->with('success', 'Terima kasih! Ulasan Anda akan muncul setelah diapprove admin.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('admin.ulasan.show', compact('ulasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('admin.ulasan.edit', compact('ulasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_pengirim' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'isi_ulasan' => 'required|string',
            'status' => 'required|in:tampil,sembunyi',
        ]);

        $ulasan = Ulasan::findOrFail($id);
        $ulasan->fill($validated);
        $ulasan->save();

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil diperbarui');
    }

    /**
     * Update status only.
     */
    public function updateStatus(string $id, string $status)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update(['status' => $status]);

        return redirect()->route('admin.ulasan.index')->with('success', 'Status ulasan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        
        if ($ulasan->gambar) {
            Storage::disk('public')->delete('ulasan/' . $ulasan->gambar);
        }
        
        $ulasan->delete();

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil dihapus');
    }
}

