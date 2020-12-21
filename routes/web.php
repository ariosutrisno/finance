<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Login
Route::get('/', 'Web\HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {

    // //Dashboard
    Route::get('/dashboard', 'Web\DashboardController@index');
    Route::get('/dashboard/{dashboard}', 'Web\DashboardController@show')->name('show');


    // Buku kas(dompet Pribadi)
    Route::get('/buku-kas', 'Web\BukuKas\DompetPribadiController@indexdompet')->name('kas');
    Route::get('/dompet-pribadi/create', 'Web\BukuKas\DompetPribadiController@createdompet');
    Route::get('/dompet-pribadi/{dompet_pribadi}', 'Web\BukuKas\DompetPribadiController@showdompet')->name('datadompet');
    Route::get('/dompet-pribadi/{dompet_pribadi}/editpemasukan', 'Web\BukuKas\DompetPribadiController@editdompetpemasukan')->name('editpemasukan');
    Route::get('/dompet-pribadi/{dompet_pribadi}/editpengeluaran', 'Web\BukuKas\DompetPribadiController@editdompetpengeluaran')->name('editpengeluaran');
    Route::post('/dompet-pribadi', 'Web\BukuKas\DompetPribadiController@dompetstore')->name('dompet');
    Route::patch('/dompet-pribadi/{dompet_pribadi}', 'Web\BukuKas\DompetPribadiController@updatedompet')->name('updatedompet');
    Route::get('/dompet-pribadi/hapus/{dompet_pribadi}', 'Web\BukuKas\DompetPribadiController@destroydompet')->name('deletdompet');
    /**
     * SEARCH DOMPET PRIBADI
     */
    Route::get('/dompet-pribadi/search', 'Web\BukuKas\DompetPribadiController@searchdompet')->name('search_dompet');
    Route::get('/dompet-pribadi/daterange', 'Web\BukuKas\DompetPribadiController@daterange')->name('date_range');
    Route::get('/dompet-pribadi/list', 'Web\BukuKas\DompetPribadiController@list')->name('list');


    /**
     * FORM BUKU KAS
     */
    Route::get('/form', 'Web\BukuKas\FormBukuController@formbukukas')->name('bukukas');
    Route::post('/form', 'Web\BukuKas\FormBukuController@simpanbuku')->name('buku');

    //hutang
    Route::get('/hutang', 'Web\HutangPiutang\HutangController@index')->name('indexhutang');
    Route::get('/hutang/{hutang}', 'Web\HutangPiutang\HutangController@showhutang');
    Route::get('/hutang/{idx_hutang}/edit', 'Web\HutangPiutang\HutangController@edit')->name('EditHutang');
    Route::patch('/hutang/{idx_hutang}', 'Web\HutangPiutang\HutangController@update')->name('updatehutang');
    Route::get('/hutang/hapus/{idx_hutang}', 'Web\HutangPiutang\HutangController@destroyhutang')->name('delethutang');
    Route::post('/hutang', 'Web\HutangPiutang\HutangController@postHutang')->name('hutangPost');
    /**
     * SEARCH 
     */
    Route::post('/hutang/search', 'Web\HutangPiutang\HutangController@searchHutang')->name('searchHutang');
    Route::post('/hutang/list', 'Web\HutangPiutang\HutangController@listHutang')->name('listHutang');

    // piutang
    Route::get('/piutang', 'Web\HutangPiutang\PiutangController@index');
    Route::post('/piutangPost', 'Web\HutangPiutang\PiutangController@postPiutang')->name('piutangPost');
    Route::get('/piutang/{idx_piutang}/edit', 'Web\HutangPiutang\PiutangController@editpiutang')->name('EditPiutang');
    Route::get('/piutang/{idx_piutang}', 'Web\HutangPiutang\PiutangController@showpiutang')->name('showpiutang');
    Route::patch('/piutang/{idx_piutang}', 'Web\HutangPiutang\PiutangController@update')->name('UpdatePiutang');
    Route::get('/piutang/hapus/{idx_piutang}', 'Web\HutangPiutang\PiutangController@destroypiutang')->name('deletepiutang');
    /**
     * SEARCH PIUTANG
     */
    Route::post('/piutang/search', 'Web\HutangPiutang\PiutangController@searchPiutang')->name('Searchpiutang');
    Route::post('/piutang/list', 'Web\HutangPiutang\PiutangController@listpiutang')->name('listpiutang');


    /**
     * LAPORAN KAS
     */
    Route::get('/laporan-kas/harian', 'Web\LaporanKas\LaporanKasSemuaController@harian')->name('harian');
    Route::get('/laporan-kas/bulanan', 'Web\LaporanKas\LaporanKasSemuaController@bulanan')->name('bulanan');
    Route::get('/laporan-kas/tahunan', 'Web\LaporanKas\LaporanKasSemuaController@tahunan')->name('tahunan');
    /**
     * LAPORAN KAS PER BUKU
     */
    Route::get('/laporan-kas/harian/{laporan_kas}', 'Web\LaporanKas\LaporanKasSemuaController@show')->name('show');
    Route::get('/laporan-kas/bulanan/{laporan_kas}', 'Web\LaporanKas\LaporanKasSemuaController@showbulan')->name('showbulan');
    Route::get('/laporan-kas/tahunan/{laporan_kas}', 'Web\LaporanKas\LaporanKasSemuaController@showtahunan')->name('showtahunan');
    /**
     * Surat Menyurat
     */
    Route::get('/surat', 'Web\SuratMenyurat\SuratController@suratindex');

    /**BUAT SURAT */
    Route::get('/buat-surat', 'Web\SuratMenyurat\BuatSuratController@index');

    Route::get('/pengaturan-surat', 'Web\SuratMenyurat\PengaturanSuratController@index')->name('pengaturansurat');
    /**
     * Catatan Surat
     */
    Route::get('/catatan-surat', 'Web\SuratMenyurat\CatatanSuratController@indexsurat')->name('catatan');
    /**
     * kategori Surat
     */
    Route::get('/kategori-surat', 'Web\SuratMenyurat\KategoriSuratController@index')->name('jenis_kategori');
    Route::post('/kategori-surat', 'Web\SuratMenyurat\KategoriSuratController@store')->name('kategori');
    Route::get('/kategori-surat/hapus/{kategori_surat}', 'Web\SuratMenyurat\KategoriSuratController@destroy');
    Route::get('/kategori-surat/{kategori_surat}/edit', 'Web\SuratMenyurat\KategoriSuratController@editkategori');
    Route::post('/kategori-surat/{kategori_surat}', 'Web\SuratMenyurat\KategoriSuratController@updatekategori');

    /**
     * Pengaturan Bukukas
     */
    Route::get('/pengaturan-kategori', 'Web\Pengaturan\PengaturanKategoriController@index');
    Route::get('/pengaturan-akun', 'Web\Pengaturan\PengaturanAkunController@index');
    Route::get('/pengaturan-multiUser', 'Web\Pengaturan\PengaturanMultiuserController@index');

    /**
     * TIPE SURAT
     */

    // INVOICE
    Route::get('/invoice', 'Web\TipeSurat\InvoiceController@index')->name('invoice');
    Route::get('/invoice/{idx_invoice}/edit', 'Web\TipeSurat\InvoiceController@edit')->name('invoice-edit');
    Route::get('/create-invoice', 'Web\TipeSurat\InvoiceController@create')->name('invoice-create');
    Route::get('/create-invoice/{idx_invoice}', 'Web\TipeSurat\InvoiceController@jquerycreate')->name('jquerycreate');
    Route::post('/invoice-post', 'Web\TipeSurat\InvoiceController@store')->name('invoice-store');
    Route::post('/invoice-Update/{idx_invoice}/update', 'Web\TipeSurat\InvoiceController@update')->name('invoice-update');
    Route::get('/invoice/{idx_invoice}/delete', 'Web\TipeSurat\InvoiceController@destroy')->name('invoice-delete');
    Route::get('/invoice/{idx_invoice}/print', 'Web\TipeSurat\InvoiceController@cetak_pdf');
    // END INVOICE

    // Offering Letter
    
    Route::get('/offering', 'Web\TipeSurat\offeringletter@index')->name('offering');
    Route::get('/offering/{idx_offering_letter}/edit', 'Web\TipeSurat\offeringletter@edit')->name('offeringedit');
    Route::get('/create-offering', 'Web\TipeSurat\offeringletter@create')->name('offeringcreate');
    Route::post('/offering-post', 'Web\TipeSurat\offeringletter@storeoffering')->name('offeringpost');
    Route::post('/offering-Update', 'Web\TipeSurat\offeringletter@updateffering')->name('offeringupdate');
    Route::get('/offering/{idx_offering_letter}/delete', 'Web\TipeSurat\offeringletter@destroyoffering')->name('offeringdelete');
    Route::get('/offering/{idx_offering_letter}/print', 'Web\TipeSurat\offeringletter@cetak_pdf');

    // End Offering Letter


    // Quotation
    Route::get('/quotation', 'Web\TipeSurat\QuotationController@index')->name('quotation');
    Route::get('/quotation/{id_quotation}/edit', 'Web\TipeSurat\QuotationController@edit')->name('quotationedit');
    Route::get('/quotation-create', 'Web\TipeSurat\QuotationController@create')->name('quotationcreate');
    Route::get('/quotation-create/{id_quotation}', 'Web\TipeSurat\QuotationController@jquerycreate')->name('quotationjquerycreate');
    Route::post('/quotation-post', 'Web\TipeSurat\QuotationController@store')->name('quotationstore');
    Route::post('/quotation-Update/{id_quotation}/update', 'Web\TipeSurat\QuotationController@update')->name('quotationupdate');
    Route::get('/quotation/{id_quotation}/delete', 'Web\TipeSurat\QuotationController@destroy')->name('quotationdelete');
    Route::get('/quotation/{id_quotation}/print', 'Web\TipeSurat\QuotationController@cetak_pdf');
    Route::get('/quotation-edit', 'Web\TipeSurat\QuotationController@edit');
    Route::get('/quotation-edit/{id_quotation}', 'Web\TipeSurat\QuotationController@jqueryedit')->name('quotationjqueryedit');
    Route::get('/quotation/api/autocomplated', 'web\TipeSurat\QuotationController@getAutocompleteData');
    // End Quotation

    // Pelanggan
    
    Route::get('/daftar-pelanggan', 'Web\SuratMenyurat\DaftarPelangganController@index')->name('daftarpelanggan');
    Route::get('/daftar-pelanggan-create', 'Web\SuratMenyurat\DaftarPelangganController@create')->name('pelanggan-create');
    Route::get('/daftar-pelanggan/{idx_pelanggan}/edit', 'Web\SuratMenyurat\DaftarPelangganController@edit')->name('pelanggan-edit');
    Route::post('/daftar-store', 'Web\SuratMenyurat\DaftarPelangganController@store')->name('pelanggan-store');
    Route::post('/daftar-pelanggan-update', 'Web\SuratMenyurat\DaftarPelangganController@update')->name('pelanggan-update');
    Route::get('daftar-pelanggan/{idx_pelanggan}/delete', 'Web\SuratMenyurat\DaftarPelangganController@delete')->name('pelanggan-delete');
    Route::get('daftar-pelanggan/search', 'Web\SuratMenyurat\DaftarPelangganController@search')->name('search');
    

});