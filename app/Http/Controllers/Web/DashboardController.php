<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dashboard\BukuKas\Dompet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
/**
 * DB Model Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $sidebardompet = BuatBuku::where('id','=',$user)->where('status','=','aktif')->get();
        $kosong = '';
        if (count($sidebardompet) !== 0) {
            # code...
            $id_kas = BuatBuku::where('id', '=', $user)->where('status', '=', 'aktif')->first('idx_buku_kas');
            CatatanBuku::with('BuatBuku', 'Model_Kategori', 'Model_Sub_Kategori')->where('idx_buku_kas', '=', $id_kas->idx_buku_kas)->where('tbl_catatan_buku.status', '=', 'aktif')->first();
        } else {
            # code...
        }
        
        $hitung = 0;
        if (!empty($sidebardompet->buku_saldo)) {
            # code...
            $hitung = $sidebardompet->buku_saldo;
        } else {
            # code...
            $hitung;
        }
        /**
         * RUMUS KENAIKAN DAN PENURUNAN PERSENTASE
         * (AWAL - AKHIR)/AWAL*100%
         */
        $data_saldo = BuatBuku::where('id','=',$user)->sum('buku_saldo');
        $data_saldo_awal = BuatBuku::where('id','=',$user)->sum('buku_saldo_awal');
        // dd($data_saldo_awal);
        $total = CatatanBuku::where('id_user','=',$user)->sum('catatan_jumlah');
        $hasilpemasukan = CatatanBuku::where('id_user','=',$user)->where('idx_kategori','=',1)->sum('catatan_jumlah');
        $hasilpengeluaran = CatatanBuku::where('id_user','=',$user)->where('idx_kategori','=',2)->sum('catatan_jumlah');
        /**
         * BUKU KAS
         */
        
        $saldo_awal = $data_saldo_awal ;
        $saldo_akhir = $data_saldo ;
        if ($saldo_awal == 0 && $saldo_akhir == 0) {
            # code...
            $hasil = 0;
        } else {
            # code...
            $hasil = (($saldo_awal - $saldo_akhir)/$saldo_awal)*(1);
        }
        
        $data_hasil = number_format($hasil,1);   
        if ($saldo_awal > $saldo_akhir) {
            # code...
            $data = 'Turun ' . $data_hasil;
            $data_persen = '-' . $data_hasil;
        } elseif ($saldo_awal == $saldo_akhir) {
            $data = ' ' . $data_hasil;
            $data_persen = '' . $data_hasil;
        }else {
            $data = 'Naik ' . abs($data_hasil);
            $data_persen = '+' . abs($data_hasil);
        }
        
        
        /**
         * PEMASUKAN
         */
        $pemasukan_awal = $data_saldo;
        $pemasukan_akhir = $hasilpemasukan;
        if ($pemasukan_awal == 0 && $pemasukan_akhir == 0) {
            # code...
            $hasil_pemasukan = 0;
        } else {
            # code...
            $hasil_pemasukan = ($pemasukan_awal - $pemasukan_akhir)/$pemasukan_awal*(100/100);
        }
        $data_pemasukan = number_format($hasil_pemasukan,1);
        
        if ($pemasukan_awal > $pemasukan_akhir) {
            # code...
            $pemasukan = 'Turun ' . $data_pemasukan;
            $pemasukan_persen = '-' . abs($data_pemasukan);
        }elseif ($pemasukan_awal == $pemasukan_akhir) {
            # code...
            $pemasukan = ' ' . $data_pemasukan;
            $pemasukan_persen = ' ' . abs($data_pemasukan);
        }  else {
            # code...
            $pemasukan = 'Naik ' . $data_pemasukan;
            $pemasukan_persen = '+' . abs($data_pemasukan);
        }
        
        
        
        /**
         * PENGELUARAN
         */
        $pengeluaran_awal = $data_saldo;
        $pengeluaran_akhir = $hasilpengeluaran;
        if ($pengeluaran_awal == 0 && $pengeluaran_akhir == 0) {
            # code...
            $hasil_pengeluaran = 0;
        } else {
            # code...
            $hasil_pengeluaran = ($pengeluaran_awal - $pengeluaran_akhir)/$pemasukan_awal * (100/100);
        }
        
        $data_pengeluaran = number_format($hasil_pengeluaran*100,1);
        if ($pengeluaran_awal > $pengeluaran_akhir) {
            # code...
            $pengeluaran_ket = 'Turun ' . $data_pengeluaran;
            $pengeluaran_persen = '-' . abs($data_pengeluaran);
        }elseif ($pengeluaran_awal == $pengeluaran_akhir) {
            # code...
            $pengeluaran_ket = ' ' . $data_pengeluaran;
            $pengeluaran_persen = '' . abs($data_pengeluaran);
        }else {
            # code...
            $pengeluaran_ket = 'Naik ' . $data_pengeluaran;
            $pengeluaran_persen = '+' . abs($data_pengeluaran);
        }
        
        
        /**
         * GRAFIK DASHBOARD
         */
        /**
         * DATA GRAFIK LAPORAN KAS
         */
        $data_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        for ($bulan = 1; $bulan < 13; $bulan++) {
            # code...
            $month = '2020-' . $bulan . '-20';
            $date = date('m', strtotime($month));
            $catatan_jumlah = CatatanBuku::where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', 1)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan[] = $catatan_jumlah;

            $catatan_jumlah2 = CatatanBuku::where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', 2)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan2[] = $catatan_jumlah2;
        }
        $bulangrafik = json_encode($data_bulan);
        $pemasukangrafik = json_encode($jumlah_catatan);
        $pengeluarangrafik = json_encode($jumlah_catatan2);

        

        /**
         * DATA GRAFIK LAPORAN KAS SEMINGGU
         */
        $tahun = date('Y');
        $bulan = date('m');
        $tgl = date('d');
    
        for ($i = 0; $i <= 6; $i++) { 
            # code...
            $format = ($tahun . '-' . $bulan . '-' . $tgl);
            $minggu = date('Y-m-d', strtotime($format)-$i);
            $d = date('D',strtotime('-' .$i. 'days'));
            $day = $this->hari_ini($d);
            $days[] = $day;
            $catatan_jumlahminggu = CatatanBuku::where('status','=','aktif')->where('id_user','=',$user)->where('idx_kategori','=',1)->whereDate('catatan_tgl','=', $minggu)->sum('catatan_jumlah');
            $catatan_jumlahminggu12[] = $catatan_jumlahminggu;
            $catatan_jumlahminggu2 = CatatanBuku::where('status','=','aktif')->where('id_user','=',$user)->where('idx_kategori','=',2)->whereDate('catatan_tgl','=', $minggu)->sum('catatan_jumlah');
            $catatan_jumlahminggu24[] = $catatan_jumlahminggu2;
        
        }
        
        $data_weeks = json_encode($days);
        $pemasukanperminggu = json_encode($catatan_jumlahminggu12);
        $pengeluaranperminggu = json_encode($catatan_jumlahminggu24);
        //  dd($days);
        return view('dashboard.dashboard', compact(
            'sidebardompet',
            'hitung',
            'data_saldo',
            'hasilpemasukan',
            'hasilpengeluaran',
            'bulangrafik',
            'pemasukangrafik',
            'pengeluarangrafik',
            'data',
            'data_persen',
            'pengeluaran_ket',
            'pengeluaran_persen',
            'pemasukan',
            'pemasukan_persen',
            'data_weeks',
            'pemasukanperminggu',
            'pengeluaranperminggu',
        ));
    }

    public function show(Request $request,$idx_buku_kas)
    {
        /**
         * saldo perbuku
         * 
         */
        $user = Auth::id();
        $buku_saldo = BuatBuku::where('id','=',$user)->where('idx_buku_kas','=',$idx_buku_kas)->sum('buku_saldo');
        /**
         * kas
         */
        $kas= BuatBuku::where('id', '=', $user)->get();
        /**
         * mata uang
         */
        $mata_uang = BuatBuku::where('id','=',$user)->first();

        /**
         * Persen Saldo Kas
         * (AWAL - AKHIR)/AWAL*100%
         */
        
        $saldo_awal = BuatBuku::where('id', '=', $user)->where('idx_buku_kas', '=', $idx_buku_kas)->sum('buku_saldo_awal');
        $saldo_akhir = BuatBuku::where('id', '=', $user)->where('idx_buku_kas', '=', $idx_buku_kas)->sum('buku_saldo');
        $hasil = (($saldo_awal - $saldo_akhir)/$saldo_awal)*(100/100);
        $persen_saldo = number_format($hasil,1);
        if ($saldo_awal > $saldo_akhir) {
            # code...
            $data = 'Turun '.$persen_saldo;
            $data_persen = '-'.$persen_saldo;
        }elseif($saldo_awal == $saldo_akhir){
            $data = ''.$persen_saldo;
            $data_persen = 'tidak ada kenaikan/penurunan'.$persen_saldo;
        }else{
            $data = 'Naik ' .abs( $persen_saldo);
            $data_persen = '+' .abs($persen_saldo);
        }
        /**
         * Persen Pemasukan
         */
        $pemasukan_kas = CatatanBuku::where('idx_buku_kas', '=', $idx_buku_kas)->where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', '1')->sum('catatan_jumlah');
        $saldo_pemasukan = $pemasukan_kas;
        /**
         * Persen Pengeluaran
         */
        $pengeluaran_kas = CatatanBuku::where('idx_buku_kas', '=', $idx_buku_kas)->where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', '2')->sum('catatan_jumlah');
        $saldo_pengeluaran = $pengeluaran_kas;
        /**
         * DATA GRAFIK LAPORAN KAS
         */
        $data_bulan = ['Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $month = [];
        for ($bulan = 1; $bulan < 13; $bulan++) {
            # code...
            $month = '2020-' . $bulan . '-20';
            $date = date('m', strtotime($month));
            $catatan_jumlah = CatatanBuku::where('idx_buku_kas','=',$idx_buku_kas)->where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', 1)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan[] = $catatan_jumlah;

            $catatan_jumlah2 = CatatanBuku::where('idx_buku_kas', '=', $idx_buku_kas)->where('status', '=', 'aktif')->where('id_user', '=', $user)->where('idx_kategori', '=', 2)->whereMonth('catatan_tgl', '=', $date)->sum('catatan_jumlah');
            $jumlah_catatan2[] = $catatan_jumlah2;
        }
        $bulan = json_encode($data_bulan);
        $pemasukan = json_encode($jumlah_catatan);
        $pengeluaran = json_encode($jumlah_catatan2);
        return view('dashboard.dashboardshow',compact('buku_saldo','saldo_pemasukan','mata_uang','saldo_pengeluaran','bulan','pemasukan','pengeluaran', 'data_persen','kas','data'));
    }
    function hari_ini($hari)
    {
        
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;
    }
 
}