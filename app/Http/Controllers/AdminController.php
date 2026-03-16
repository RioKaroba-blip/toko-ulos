<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $jumlahProduk = 0;
        $jumlahKategori = 0;
        $jumlahProdukLaris = 0;
        $jumlahUlasan = 0;
        $jumlahUlasanTampil = 0;

        try {
            $jumlahProduk = \App\Models\Product::count();
            $jumlahKategori = \App\Models\Kategori::count();
            $jumlahProdukLaris = \App\Models\Product::where('is_laris', 1)->count();
            $jumlahUlasan = \App\Models\Ulasan::count();
            $jumlahUlasanTampil = \App\Models\Ulasan::where('tampil', 1)->count();
        } catch (\Exception $e) {}

        return view('admin.dashboard', compact(
            'jumlahProduk',
            'jumlahKategori',
            'jumlahProdukLaris',
            'jumlahUlasan',
            'jumlahUlasanTampil'
        ));
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'whatsapp' => 'nullable|string',
            'email' => 'nullable|email',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->update($request->only([
            'whatsapp', 'email', 'facebook',
            'instagram', 'tiktok', 'youtube'
        ]));

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diupdate!');
    }

    public function password()
    {
        return view('admin.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.password')->with('success', 'Password berhasil diubah!');
    }
}