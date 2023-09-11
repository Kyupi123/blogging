<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'landing');

Route::get('/about', function () {
    echo "<h1>This is the About page.</h1> ";
});

//parameter wajib
Route::get('/salam/{nama}', function ($nama) {
    echo "<h2>Good day, $nama!</h2>";
});

Route::get('/salam', function(){
    echo "<h2>Good day, nameless one!</h2>";
});

//parameter opsional
Route::get('/produk/{nama?}/{qty?}', function
($nama = "N/A", $qty = 0) {
    echo "<p>Jual <strong>$nama</strong>.
    Stok saat ini: $qty</p>";
});

Route::get('users/{id}', function ($id) {
    return "Displaying user with ID: $id";
})-> where('id', '[A-z0-9]{3}');

Route::get('/hubungi-kami', function () {
    return '<h3>Hubungi kami</h3>';
});

Route::redirect('/contact-us', '/hubungi-kami', 301);

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        echo "<h1>Administrasi</h1>";
    });

    Route::prefix('/mahasiswa')->group(function () {
        Route::get('/', function() {
            echo "<h1>Administrasi Mahasiswa</h1>";
        });
        Route::get('/sarjana', function() {
            echo "<h1>Administrasi Mahasiswa Sarjana</h1>";
        });
    });
    Route::get('/dosen', function () {
        echo "<h1>Administrasi Dosen</h1>";
    });
    Route::get('/staf', function () {
        echo "<h1>Administrasi Staf Kampus</h1>";
    });
});

Route::fallback(function () {
    return redirect('/');
});
