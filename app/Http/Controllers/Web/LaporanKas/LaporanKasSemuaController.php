<?php

namespace App\Http\Controllers\Web\LaporanKas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
/**
 * DB Model Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;
use PhpParser\Node\Stmt\Foreach_;

class LaporanKasSemuaController extends Controller
{
    public function harian()
    {
        /**
         * USER ID
         */
        $user = Auth::id();
        /**
         * FILTER KAS
         */
        $filter = BuatBuku::where('id', '=', $user)->get();
        
        /**
         * table data
         */
        $kas_harian = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('id_user','=',$user)->where('status', '=', 'aktif')
        ->orderBy('catatan_tgl','desc')
        ->paginate(10);

        /**
         * Data Grafik
         */
        $month = date('m');
        $year = date('y');
        $day = date('d');
        $days = [];
        $nominal_pemasukan = [];
        $nominal_pengeluaran = [];
        $calender = CAL_GREGORIAN;
        $hari = cal_days_in_month($calender, $month, $year);
        for ($i = 1; $i <= $hari; $i++) {
            $days[] = $i;
            $harian = date('Y-m-'). $i;
            $date = date('Y-m-d', strtotime($harian));
            $data_grafik = CatatanBuku::where('status','=','aktif')->where('id_user','=',$user)->where('idx_kategori','=',1)->whereDate('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pemasukan[] = $data_grafik;

            $data_grafik2 = CatatanBuku::where('status','=','aktif')->where('id_user','=',$user)->where('idx_kategori','=',2)->whereDate('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pengeluaran[] = $data_grafik2;
        
        }
        // dd($nominal_pengeluaran);
        $pemasukan = json_encode($nominal_pemasukan);
        $pengeluaran = json_encode($nominal_pengeluaran);
        $day = json_encode($days);


        return view('dashboard.laporan-kas.harian', compact( 'kas_harian', 'pemasukan', 'pengeluaran', 'filter','day'));
    }
    public function bulanan()
    {
        /**
         * USER ID
         */
        $user = Auth::id();
        /**
         * FILTER KAS
         */
        $filter = BuatBuku::where('id', '=', $user)->get();
        /**
         * table data
         */
        $kas_harian = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('id_user', '=', $user)->where('status', '=', 'aktif')
        ->orderBy('catatan_tgl','desc')
        ->paginate(10);
        /**
         * DATA GRAFIK LAPORAN KAS
         */
        $data_bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $month = [];
        for ($bulan=1; $bulan < 13; $bulan++) {
            # code...
            $month = '2020-'.$bulan.'-20';
            $date = date('m',strtotime($month));
            $catatan_jumlah = CatatanBuku::where('status','=','aktif')->where('id_user','=',$user)->where('idx_kategori','=',1)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan[] = $catatan_jumlah;
            
            $catatan_jumlah2 = CatatanBuku::where('status','=','aktif')->where('id_user','=',$user)->where('idx_kategori','=',2)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan2[] = $catatan_jumlah2;
            
        }
        // dd($jumlah_catatan);
        $bulan = json_encode($data_bulan);
        $pemasukan = json_encode($jumlah_catatan);
        $pengeluaran = json_encode($jumlah_catatan2);


        return view('dashboard.laporan-kas.bulanan', compact( 'kas_harian', 'bulan', 'pemasukan', 'pengeluaran', 'filter'));
    }
    public function tahunan()
    {
        /**
         * USER ID
         */
        $user = Auth::id();
        /**
         * FILTER KAS
         */
        $filter = BuatBuku::where('id', '=', $user)->get();

        /**
         * table data
         */
        $kas_harian = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('id_user', '=', $user)->where('status', '=', 'aktif')
        ->orderBy('catatan_tgl','desc')
        ->paginate(10);
        $kas = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('status', '=', 'aktif')->first();
        /**
         * DATA GRAFIK LAPORAN KAS
         */
        /**
         * Data Grafik
         */
        
        $nominal_pemasukan = [];
        $nominal_pengeluaran = [];
        $tahunan = ['2010','2011','2012','2013','2014','2015','2016','2017','2018','2019','2020'];
        for ($tahun = 2010; $tahun <= 2020; $tahun++) {
            $tahunannn = $tahun.'-05-01' ;
            $date = date('Y', strtotime($tahunannn));
            $data_grafik = CatatanBuku::where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', 1)->whereYear('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pemasukan[] = $data_grafik;

            $data_grafik2 = CatatanBuku::where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', 2)->whereYear('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pengeluaran[] = $data_grafik2;
        }
        $pemasukan = json_encode($nominal_pemasukan);
        $pengeluaran = json_encode($nominal_pengeluaran);
        $tahunan = json_encode($tahunan);
        return view('dashboard.laporan-kas.tahunan', compact( 'kas_harian', 'pemasukan', 'pengeluaran', 'filter','tahunan'));
    }

    /**
     * LAPORAN PER BUKU KAS
     */
    public function show($idx_buku_kas)
    {
        /**
         * USER ID
         */
        $user = Auth::id();
        /**
         * FILTER KAS
         */
        $filter = BuatBuku::where('id', '=', $user)->get();
        /**
         * table data
         */
        $kas_harian = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('idx_buku_kas','=',$idx_buku_kas)->where('status', '=', 'aktif')
        ->orderBy('catatan_tgl', 'desc')
        ->paginate(10);

        /**
         * Data Grafik
         */
        $month = date('m');
        $year = date('y');
        $day = date('d');
        $days = [];
        $nominal_pemasukan = [];
        $nominal_pengeluaran = [];
        $calender = CAL_GREGORIAN;
        $hari = cal_days_in_month($calender, $month, $year);
        for ($i = 1; $i <= $hari; $i++) {
            $days[] = $i;
            $harian = date('Y-m-') . $i;
            $date = date('Y-m-d', strtotime($harian));
            $data_grafik = CatatanBuku::where('status', '=', 'aktif')->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori', '=', 1)->whereDate('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pemasukan[] = $data_grafik;

            $data_grafik2 = CatatanBuku::where('status', '=', 'aktif')->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori', '=', 2)->whereDate('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pengeluaran[] = $data_grafik2;
        }
        
        $pemasukan = json_encode($nominal_pemasukan);
        $pengeluaran = json_encode($nominal_pengeluaran);
        $day = json_encode($days);

        return view('dashboard.laporan-kas.show', compact( 'kas_harian', 'day', 'pemasukan', 'pengeluaran','filter'));
    }
    public function showbulan($idx_buku_kas)
    {
        /**
         * USER ID
         */
        $user = Auth::id();
        /**
         * FILTER KAS
         */
        $filter = BuatBuku::where('id', '=', $user)->get();
        /**
         * table data
         */
        $kas_harian = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('idx_buku_kas', '=', $idx_buku_kas)->where('status', '=', 'aktif')
        ->orderBy('catatan_tgl', 'desc')
        ->paginate(10);
        /**
         * DATA GRAFIK LAPORAN KAS
         */
        $data_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $month = [];
        for ($bulan = 1; $bulan < 13; $bulan++) {
            # code...
            $month = '2020-' . $bulan . '-20';
            $date = date('m', strtotime($month));
            $catatan_jumlah = CatatanBuku::where('status', '=', 'aktif')->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori', '=', 1)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan[] = $catatan_jumlah;

            $catatan_jumlah2 = CatatanBuku::where('status', '=', 'aktif')->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori', '=', 2)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan2[] = $catatan_jumlah2;
        }
        // dd($jumlah_catatan);
        $bulan = json_encode($data_bulan);
        $pemasukan = json_encode($jumlah_catatan);
        $pengeluaran = json_encode($jumlah_catatan2);


        return view('dashboard.laporan-kas.showbulanan', compact( 'kas_harian', 'bulan', 'pemasukan', 'pengeluaran', 'filter'));
    }
    public function showtahunan($idx_buku_kas)
    {
        /**
         * USER ID
         */
        $user = Auth::id();
        /**
         * FILTER KAS
         */
        $filter = BuatBuku::where('id', '=', $user)->get();

        /**
         * table data
         */
        $kas_harian = CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('idx_buku_kas', '=', $idx_buku_kas)->where('status', '=', 'aktif')
        ->orderBy('catatan_tgl', 'desc')
        ->paginate(10);
        /**
         * DATA GRAFIK LAPORAN KAS
         */
        /**
         * Data Grafik
         */

        $nominal_pemasukan = [];
        $nominal_pengeluaran = [];
        $tahunan = ['2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020'];
        for ($tahun = 2010; $tahun <= 2020; $tahun++) {
            $tahunannn = $tahun . '-05-01';
            $date = date('Y', strtotime($tahunannn));
            $data_grafik = CatatanBuku::where('status', '=', 'aktif')->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori', '=', 1)->whereYear('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pemasukan[] = $data_grafik;

            $data_grafik2 = CatatanBuku::where('status', '=', 'aktif')->where('idx_buku_kas', '=', $idx_buku_kas)->where('idx_kategori', '=', 2)->whereYear('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $nominal_pengeluaran[] = $data_grafik2;
        }
        $pemasukan = json_encode($nominal_pemasukan);
        $pengeluaran = json_encode($nominal_pengeluaran);
        $tahunan = json_encode($tahunan);
        return view('dashboard.laporan-kas.tahunan', compact( 'kas_harian', 'pemasukan', 'pengeluaran', 'filter', 'tahunan'));
    }

}
