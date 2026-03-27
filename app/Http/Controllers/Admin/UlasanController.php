<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = collect([]);
        try {
            $ulasan = \App\Models\Ulasan::all();
        } catch (\Exception $e) {}

        return view('admin.ulasan.index', compact('ulasan'));
    }

    public function tampilkan($id)
    {
        \App\Models\Ulasan::findOrFail($id)->update(['status' => 'tampil']);
        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan ditampilkan!');
    }

    public function sembunyikan($id)
    {
        \App\Models\Ulasan::findOrFail($id)->update(['status' => 'sembunyi']);
        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan disembunyikan!');
    }

    public function destroy($id)
    {
        \App\Models\Ulasan::findOrFail($id)->delete();
        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil dihapus!');
    }
}
