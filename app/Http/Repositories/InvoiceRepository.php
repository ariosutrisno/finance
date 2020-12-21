<?php

namespace App\Http\Repositories;

use App\Dashboard\SuratMenyurat\Invoice;
use App\Dashboard\SuratMenyurat\DaftarPelanggan;
use App\Dashboard\SuratMenyurat\item;
use App\Dashboard\SuratMenyurat\term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class InvoiceRepository
{
    var $data_delete;
    public function index($user_id)
    {
        $invoice = Invoice::where('user_id', '=', $user_id)->orderBy('created_at', 'desc')
        ->select('user_id','id_pelanggan','tanggal_invoice','jatuh_tempo_invoice','nomor_surat','perihal','keterangan','jumlah_tagihan','status_pembayaran')
        ->get();
        return $invoice;
    }
    public function createinovice()
    {
        $bulan_romawi = array('', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII');
        $Awal = 'ALAN-C';
        $noUrutAkhir = Invoice::max('nomor_surat');
        $nomor_surat = sprintf("%03s", abs($noUrutAkhir + 1)) . '/' . $Awal . '/' . $bulan_romawi[date('m')] . '/' . date('Y');
        if ($noUrutAkhir) {
            $nomor_surat;
        }
        $user_id = Auth::id();
        $daftar_pelanggan = DaftarPelanggan::where('user_id', '=', $user_id)->get();
    }
    public function simpan($request,$user_id)
    {
        $data = $request->all();
        Invoice::create([
            'id_pelanggan' => $request->name,
            'user_id' => $user_id,
            'tanggal_invoice' => $request->dikirim,
            'jatuh_tempo_invoice' => $request->tempo,
            'nomor_surat' => $request->nosurat,
            'perihal' => $request->perihal,
            'keterangan' => $request->catatan,
            'jumlah_tagihan' => $request->jumlah,
        ]);
        $id_invoice = DB::getPdo()->lastInsertId();
        if (count($data['np'] > 0)) {
            # code...
            foreach ($data['np'] as $key => $value) {
                # code...
                $data2 = array(
                    'id_invoice' => $id_invoice,
                    'nama_project' => $data['np'][$key],
                    'biaya_project' => $data['cp'][$key],
                );
                item::create($data2);
            }
            foreach ($data['terminstandar'] as $key => $value) {
                # code...
                $data3 = array(
                    'id_invoice' => $id_invoice,
                    'standar_pembayaran' => $data['sp'],
                    'Dp' => $data['dpstandar'],
                    'term' => $data['terminstandar'][$key],
                );
                term::create($data3);
            }
            foreach ($data['terminmedium'] as $medium => $value) {
                # code...
                $data4 =  array(
                    'id_invoice' => $id_invoice,
                    'standar_pembayaran' => $data['sp'],
                    'Dp' => $data['dpmedium'],
                    'term' => $data['terminmedium'][$medium],
                );
                term::create($data4);
            }
            foreach ($data['terminhigh'] as $high => $value) {
                # code...
                $data5 = array(
                    'id_invoice' => $id_invoice,
                    'standar_pembayaran' => $data['sp'],
                    'Dp' => $data['dphigh'],
                    'term' => $data['terminhigh'][$high],
                );
                term::create($data5);
            }
        }
    }
    public function edit($idx_invoice,$user_id)
    {
        $invoice = Invoice::where('idx_invoice', '=', $idx_invoice)->where('status', '=', 'aktif')->where('user_id', '=', $user_id)->first();
        $pelanggan = DaftarPelanggan::where('user_id', '=', $user_id)->where('idx_pelanggan', '=', $invoice->id_pelanggan)->first();
        $daftar_pelanggan = DaftarPelanggan::where('user_id', '=', $user_id)->get();
        $term = term::where('id_invoice', '=', $idx_invoice)->first();
        $jtagihan = $invoice->jumlah_tagihan;
        $ppn = $jtagihan * 0.1;
        $total = $jtagihan + $ppn;
        $termget = term::where('id_invoice', '=', $idx_invoice)->get();
        // $item_project = $this->item_project($idx_invoice);
    }
    public function update($request,$user_id,$idx_invoice)
    {
        $data = $request->all();
        Invoice::where('idx_invoice', '=', $idx_invoice)->where('status', '=', 'aktif')->update([
            'user_id' => $user_id,
            'id_pelanggan' => $request->name,
            'tanggal_invoice' => $request->dikirim,
            'jatuh_tempo_invoice' => $request->tempo,
            'nomor_surat' => $request->nosurat,
            'perihal' => $request->perihal,
            'keterangan' => $request->catatan,
            'jumlah_tagihan' => $request->jumlah,
        ]);
        // $id_invoice = DB::getPdo()->lastInsertId();
        if (count($data['np'] > 0)) {
            # code...
            item::where('id_invoice', '=', $idx_invoice)->delete($data['np']);
            foreach ($data['np'] as $key => $value) {
                # code...
                $data2 = array(
                    'id_invoice' => $idx_invoice,
                    'nama_project' => $data['np'][$key],
                    'biaya_project' => $data['cp'][$key],
                );
                item::create($data2);
            }

            foreach ($data['terminstandar'] as $key => $value) {
                # code...
                $data3 = array(
                    'id_invoice' => $idx_invoice,
                    'standar_pembayaran' => $data['sp'],
                    'Dp' => $data['dpstandar'],
                    'term' => $data['terminstandar'][$key],
                );
                item::create($data3);
            }
            foreach ($data['terminmedium'] as $medium => $value) {
                # code...
                $data4 =  array(
                    'id_invoice' => $idx_invoice,
                    'standar_pembayaran' => $data['sp'],
                    'Dp' => $data['dpmedium'],
                    'term' => $data['terminmedium'][$medium],
                );

                item::create($data4);
            }
            foreach ($data['terminhigh'] as $high => $value) {
                # code...
                $data5 = array(
                    'id_invoice' => $idx_invoice,
                    'standar_pembayaran' => $data['sp'],
                    'Dp' => $data['dphigh'],
                    'term' => $data['terminhigh'][$high],
                );
                item::create($data5);
            }
        }
    }
    public function deleteinvoice($idx_invoice,$user_id)
    {
        $data_delete = new InvoiceRepository();
        $data_delete->invoice = Invoice::where('idx_invoice','=',$idx_invoice)->delete();
        $data_delete->term =term::where('idx_invoice','=',$idx_invoice)->delete();
        $data_delete->item = item::where('id_invoice','=',$idx_invoice);
        return $data_delete;
    }
    public function cetakpdf($idx_invoice,$user_id)
    {
        $data =  Invoice::with('item', 'Daftar_Pelanggan', 'term')->where('idx_invoice', $idx_invoice)->where('status', '=', 'aktif')->first();
        // dd($data);
        $data_term =  Invoice::with('item', 'Daftar_Pelanggan', 'term')->where('idx_invoice', $idx_invoice)->where('status', '=', 'aktif')->get();
        $term =  term::where('id_invoice', $idx_invoice)->get();
        $term1 =  term::where('id_invoice', $idx_invoice)->first('term');

        for ($i = 0; $i < count($term); $i++) {
            # code...
            $termin = $this->KonDecRomawi($i + 1);
            $term[$i]->termin = $termin;
        }
        $pelanggan = DaftarPelanggan::where('idx_pelanggan', '=', $data->id_pelanggan)->where('status', '=', 'aktif')->first();
        $pdf = PDF::loadview('dashboard.tipe-surat.invoice.print', compact('data', 'data_term', 'term', 'term1'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
    function KonDecRomawi($angka)
    {
        $hsl = "";
        if ($angka < 1 || $angka > 5000) {
            // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
            $hsl = "Batas Angka 1 s/d 5000";
        } else {
            while ($angka >= 1000) {
                // While itu termasuk kedalam statement perulangan
                // Jadi misal variable angka lebih dari sama dengan 1000
                // Kondisi ini akan di jalankan
                $hsl .= "M";
                // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
                // Varible hsl
                $angka -= 1000;
                // Lalu setelah itu varible angka di kurangi 1000 ,
                // Kenapa di kurangi
                // Karena statment ini mengambil 1000 untuk di konversi menjadi M
            }
        }


        if ($angka >= 500) {
            // statement di atas akan bernilai true / benar
            // Jika var angka lebih dari sama dengan 500
            if ($angka > 500) {
                if ($angka >= 900) {
                    $hsl .= "CM";
                    $angka -= 900;
                } else {
                    $hsl .= "D";
                    $angka -= 500;
                }
            }
        }
        while ($angka >= 100) {
            if ($angka >= 400) {
                $hsl .= "CD";
                $angka -= 400;
            } else {
                $angka -= 100;
            }
        }
        if ($angka >= 50) {
            if ($angka >= 90) {
                $hsl .= "XC";
                $angka -= 90;
            } else {
                $hsl .= "L";
                $angka -= 50;
            }
        }
        while ($angka >= 10) {
            if ($angka >= 40) {
                $hsl .= "XL";
                $angka -= 40;
            } else {
                $hsl .= "X";
                $angka -= 10;
            }
        }
        if ($angka >= 5) {
            if ($angka == 9) {
                $hsl .= "IX";
                $angka -= 9;
            } else {
                $hsl .= "V";
                $angka -= 5;
            }
        }
        while ($angka >= 1) {
            if ($angka == 4) {
                $hsl .= "IV";
                $angka -= 4;
            } else {
                $hsl .= "I";
                $angka -= 1;
            }
        }

        return ($hsl);
    }
}
