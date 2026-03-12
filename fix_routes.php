<?php

$content = '<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/produk", [HomeController::class, "produk"])->name("frontend.produk");
Route::get("/produk/{id}", [HomeController::class, "detail"])->name("frontend.detail");
Route::get("/tentang-kami", [HomeController::class, "tentangKami"])->name("frontend.tentang");
Route::get("/ulasan", [HomeController::class, "ulasan"])->name("frontend.ulasan");

Route::post("/kirim-ulasan", [UlasanController::class, "store"])->name("kirim-ulasan");

Route::middleware(["auth", "verified"])->group(function () {

    Route::get("/admin", [AdminController::class, "dashboard"])->name("admin.dashboard");

    Route::resource("/admin/produk", ProdukController::class)->names("admin.produk");

    Route::resource("/admin/kategori", KategoriController::class)->names("admin.kategori");

    Route::resource("/admin/ulasan", UlasanController::class)->names("admin.ulasan");
    Route::get("/admin/ulasan/{id}/status/{status}", [UlasanController::class, "updateStatus"])->name("admin.ulasan.updateStatus");

    Route::get("/admin/profile", [AdminController::class, "profile"])->name("admin.profile");
    Route::put("/admin/profile", [AdminController::class, "profileUpdate"])->name("admin.profile.update");

    Route::get("/admin/password", [AdminController::class, "password"])->name("admin.password");
});

Route::get("/dashboard", function () {
    return redirect()->route("admin.dashboard");
})->middleware(["auth", "verified"])->name("dashboard");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/profile", [ProfileController::class, "update"])->name("profile.update");
    Route::delete("/profile", [ProfileController::class, "destroy"])->name("profile.destroy");
});

require __DIR__."/auth.php";
';

file_put_contents('routes/web.php', $content);
echo "Routes file updated successfully!";
