<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * DB Model Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;

class FormKasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('dashboard.buku-kas.dompetpribadi',function($view){
            $view->with('list_dokter',CatatanBuku::pluck('nama','idx_catatan'));
        });
        view()->composer('member.sip',function($view){
            $view->with('list_dokter',CatatanBuku::pluck('nama','idx_catatan'));
        });
    }
}
