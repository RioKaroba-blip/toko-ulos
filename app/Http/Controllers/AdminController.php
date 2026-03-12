<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $jumlahProduk = Produk::count();
        $jumlahKategori = Kategori::count();
        $jumlahProdukLaris = Produk::where('is_laris', true)->count();
        $jumlahUlasan = Ulasan::count();
        $jumlahUlasanTampil = Ulasan::where('status', 'tampil')->count();

        return view('admin.dashboard', compact(
            'jumlahProduk',
            'jumlahKategori',
            'jumlahProdukLaris',
            'jumlahUlasan',
            'jumlahUlasanTampil'
        ));
    }

    /**
     * Show the form for editing the profile owner.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Update the profile owner.
     */
    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'owner_name' => 'required|string|max:255',
            'owner_bio' => 'nullable|string',
            'owner_phone' => 'nullable|string|max:20',
            'owner_address' => 'nullable|string|max:500',
            'owner_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update text fields
        $user->owner_name = $request->owner_name;
        $user->owner_bio = $request->owner_bio;
        $user->owner_phone = $request->owner_phone;
        $user->owner_address = $request->owner_address;

        // Handle photo upload
        if ($request->hasFile('owner_photo')) {
            // Delete old photo if exists
            if ($user->owner_photo && File::exists(public_path('upload/profile/' . $user->owner_photo))) {
                File::delete(public_path('upload/profile/' . $user->owner_photo));
            }

            // Upload new photo
            $photo = $request->file('owner_photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('upload/profile'), $photoName);
            $user->owner_photo = $photoName;
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    /**
     * Show the form for changing password.
     */
    public function password()
    {
        return view('admin.profile.password');
    }
}

