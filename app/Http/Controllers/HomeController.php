<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $produkLaris = Produk::where('is_laris', true)->take(6)->get();
        $kategori = Kategori::all();
        $ulasanTampil = Ulasan::where('status', 'tampil')->latest()->take(5)->get();
        
        return view('frontend.home', compact('produkLaris', 'kategori', 'ulasanTampil'));
    }

    /**
     * Display the products page.
     */
    public function produk(Request $request)
    {
        $kategori = Kategori::all();
        
        if ($request->kategori) {
            $produk = Produk::where('kategori_id', $request->kategori)->get();
        } else {
            $produk = Produk::all();
        }
        
        return view('frontend.produk', compact('produk', 'kategori'));
    }

    /**
     * Display the product detail page.
     */
    public function detail($id)
    {
        $produk = Produk::with('kategori')->findOrFail($id);
        $produkLaris = Produk::where('is_laris', true)->where('id', '!=', $id)->take(4)->get();
        
        return view('frontend.detail_produk', compact('produk', 'produkLaris'));
    }

    /**
     * Display the about us page.
     */
    public function tentangKami()
    {
        return view('frontend.tentang_kami');
    }

    /**
     * Display the reviews page.
     */
    public function ulasan()
    {
        $ulasan = Ulasan::where('status', 'tampil')->latest()->get();
        
        return view('frontend.ulasan', compact('ulasan'));
    }
}

