<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('login','api\auth\AuthController@login');
Route::post('login', 'api\auth\AuthController@login');
Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
    //USER
    Route::post('logout', 'api\auth\AuthController@logout')->name('user.logout');
    //Auth token
    Route::post('auth/token', 'api\auth\AuthController@tokencek');
    //Dashboard
    Route::get('dashboard', 'api\dashboard\dashboardController@getdashboard');
    //BUKU KAS
    Route::post('bukukas', 'api\bukukas\bukuController@createform');
    Route::get('bukukas/list', 'api\bukukas\bukuController@list');
    Route::get('bukukas/list/detail/{idx_buku_kas}', 'api\bukukas\CatatanBukuController@index');
    Route::post('bukukas/list/create', 'api\bukukas\CatatanBukuController@create');
    Route::post('bukukas/list/{idx_catatan_buku}/delete', 'api\bukukas\CatatanBukuController@destroy');
    // END BUKU KAS

    // KATEGORI Hutang & Piutang serta Buku kas
    Route::get('kategori/{idx_kategori}', 'api\bukukas\kategoriController@index');
    Route::post('kategori/create', 'api\bukukas\kategoriController@create');
    Route::post('kategori/{idx_sub_kat}/edit', 'api\bukukas\kategoriController@edit');
    Route::get('kategori/{idx_sub_kat}/delete', 'api\bukukas\kategoriController@delete');

    //hutang dan piutang
    Route::get('hutangpiutang', 'api\hutang\HutangController@allhutangpiutang');
    Route::post('hutangpiutang/create', 'api\hutang\HutangController@createhutangpiutang');
    Route::get('hutang/{idx_hutang}/hapus', 'api\hutang\HutangController@destroy');
    
    //Daftar Pelanggan
    Route::get('daftarpelanggan', 'api\SuratMenyurat\DaftarPelangganController@index');
    Route::post('daftarpelanggan/create', 'api\SuratMenyurat\DaftarPelangganController@create');
    Route::post('daftarpelanggan/{idx_pelanggan}/edit', 'api\SuratMenyurat\DaftarPelangganController@updatepelanggan');
    Route::get('daftarpelanggan/{idx_pelanggan}/delete', 'api\SuratMenyurat\DaftarPelangganController@delete');
    

    /**
     * TIPE SURAT
     */
    //Quotation
    Route::get('quotation', 'api\SuratMenyurat\quotationController@index');
    Route::get('quotation/nosurat', 'api\SuratMenyurat\quotationController@nomor_surat');
    Route::post('quotation/create', 'api\SuratMenyurat\quotationController@create');
    Route::get('quotation/{id_quotation}/edit', 'api\SuratMenyurat\quotationController@edit');
    Route::post('quotation/{id_quotation}/update', 'api\SuratMenyurat\quotationController@updatequotation');
    Route::get('quotation/{id_quotation}/hapus', 'api\SuratMenyurat\quotationController@delete');
    Route::get('quotation/{id_quotation}/print', 'api\SuratMenyurat\quotationController@cetak_pdf');
    
    //Offering Letter
    Route::get('offering', 'api\SuratMenyurat\offeringController@listoffering');
    Route::post('offering/create', 'api\SuratMenyurat\offeringController@create');
    Route::get('offering/{idx_offering_letter}/edit', 'api\SuratMenyurat\offeringController@edit');
    Route::get('offering/{idx_offering_letter}/update', 'api\SuratMenyurat\offeringController@updateofferring');
    Route::get('offering/{idx_offering_letter}/delete', 'api\SuratMenyurat\offeringController@delete');
    Route::get('offering/{idx_offering_letter}/print', 'api\SuratMenyurat\offeringController@cetak_pdf');
    
    //Invoice
    Route::get('invoice', 'api\SuratMenyurat\invoiceController@getAllinvoice');
    Route::get('invoice/create', 'api\SuratMenyurat\invoiceController@create');
    Route::post('invoice/simpan', 'api\SuratMenyurat\invoiceController@simpan');
    Route::post('invoice/{idx_invoice}/edit', 'api\SuratMenyurat\invoiceController@edit');
    Route::post('invoice/{idx_invoice}/update', 'api\SuratMenyurat\invoiceController@updateinvoice');
    Route::get('invoice/{idx_invoice}/delete', 'api\SuratMenyurat\invoiceController@delete');
    Route::get('invoice/{idx_invoice}/print', 'api\SuratMenyurat\invoiceController@cetak_pdf');
    
    
    //Profile
    Route::get('profile/edit', 'api\Profile\profileController@edit');
    Route::post('profile/update', 'api\SuratMenyurat\invoiceController@update');

});
Route::post('register', 'api\register\RegisterController@registerAsUser');