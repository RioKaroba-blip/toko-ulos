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
            $jumlahProduk = \App\Models\Produk::count();
            $jumlahKategori = \App\Models\Kategori::count();
            $jumlahProdukLaris = \App\Models\Produk::where('is_laris', 1)->count();
            $jumlahUlasan = \App\Models\Ulasan::count();
            $jumlahUlasanTampil = \App\Models\Ulasan::where('status', 'tampil')->count();
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
            'whatsapp'      => 'nullable|string',
            'email'         => 'nullable|email',
            'facebook'      => 'nullable|string',
            'instagram'     => 'nullable|string',
            'tiktok'        => 'nullable|string',
            'youtube'       => 'nullable|string',
            'owner_name'    => 'nullable|string|max:255',
            'owner_bio'     => 'nullable|string',
            'owner_phone'   => 'nullable|string|max:50',
            'owner_address' => 'nullable|string',
            'owner_photo'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        $data = $request->only([
            'whatsapp', 'email', 'facebook',
            'instagram', 'tiktok', 'youtube',
            'owner_name', 'owner_bio', 'owner_phone', 'owner_address',
        ]);

        if ($request->hasFile('owner_photo')) {
            $file = $request->file('owner_photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('upload/profile'), $filename);
            $data['owner_photo'] = $filename;
        }

        $user->update($data);

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
