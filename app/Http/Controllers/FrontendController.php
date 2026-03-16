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
        $ulasanTampil = Ulasan::with('user')->latest()->take(5)->get();

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
        $ulasan = Ulasan::with('user')->latest()->get();

        return view('frontend.ulasan', compact('ulasan'));
    }

    public function kirimUlasan(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produk,id',
            'rating'    => 'required|integer|min:1|max:5',
            'komentar'  => 'required|string|max:500',
        ]);

        Ulasan::create([
            'produk_id' => $request->produk_id,
            'user_id'   => auth()->id(),
            'rating'    => $request->rating,
            'komentar'  => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim!');
    }
}