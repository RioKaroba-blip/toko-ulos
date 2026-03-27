<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Ulasan;

class FrontendController extends Controller
{
    public function home()
    {
        $produkLaris = Produk::where('is_laris', true)->get();
        $kategori = Kategori::all();
        $ulasanTampil = Ulasan::where('status', 'tampil')->latest()->take(5)->get();

        return view('frontend.home', compact('produkLaris', 'kategori', 'ulasanTampil'));
    }

    public function produk()
    {
        $kategori = Kategori::all();
        $produk = Produk::all();

        return view('frontend.produk', compact('kategori', 'produk'));
    }

    public function detailProduk($id)
    {
        $produk = Produk::findOrFail($id);

        return view('frontend.detail_produk', compact('produk'));
    }

    public function tentangKami()
    {
        $featuredProducts = Produk::where('is_laris', true)->get();

        return view('frontend.tentang_kami', compact('featuredProducts'));
    }

    public function ulasan()
    {
        $ulasan = Ulasan::where('status', 'tampil')->latest()->get();

        return view('frontend.ulasan', compact('ulasan'));
    }

    public function kirimUlasan(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:100',
            'email'  => 'required|email|max:100',
            'ulasan' => 'required|string|max:1000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama_pengirim' => $request->nama,
            'email'         => $request->email,
            'isi_ulasan'    => $request->ulasan,
            'status'        => 'sembunyi',
        ];

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/ulasan'), $filename);
            $data['gambar'] = $filename;
        }

        Ulasan::create($data);

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim! Menunggu persetujuan admin.');
    }
}
