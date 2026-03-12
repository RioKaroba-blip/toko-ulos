<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

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
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'ulasan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ulasan = new Ulasan();
        $ulasan->nama_pengirim = $request->nama;
        $ulasan->email = $request->email;
        $ulasan->isi_ulasan = $request->ulasan;
        $ulasan->status = 'sembunyi'; // Default tersembunyi

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama = time() . '.' . $file->getClientOriginalExtension();
            $file->move('upload/ulasan', $nama);
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
        $request->validate([
            'nama_pengirim' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'isi_ulasan' => 'required',
            'status' => 'required|in:tampil,sembunyi',
        ]);

        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update($request->all());

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
        
        if ($ulasan->gambar && file_exists(public_path('upload/ulasan/' . $ulasan->gambar))) {
            unlink(public_path('upload/ulasan/' . $ulasan->gambar));
        }
        
        $ulasan->delete();

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil dihapus');
    }
}

