<?php

namespace App\Http\Controllers\Web\BukuKas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * DB Alan Finenance
 */

use App\Dashboard\BukuKas\Model_Kategori;
use App\Dashboard\BukuKas\Model_Sub_Kategori;
use App\Dashboard\BukuKas\BuatBuku;
use App\Dashboard\BukuKas\CatatanBuku;
use App\Dashboard\HutangPiutang\Hutang;
use App\Dashboard\HutangPiutang\Piutang;
use App\User;
use Illuminate\Support\Facades\Auth;

class FormBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formbukukas()
    {
        $user = Auth::user()->id;
        // dd($user);
        return view('dashboard.pengaturan.pengaturan-buat-buku-kas', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpanbuku(Request $request)
    {
        $user = Auth::user()->id;
    
        try {
            //code...
            $bukukas = BuatBuku::insert([
                'id' => $user,
                'buku_nama' => $request->buku_nama,
                'buku_mata_uang' => $request->buku_mata_uang,
                'buku_saldo' => $request->buku_saldo,
                'buku_saldo_awal'=>$request->buku_saldo_awal,
                'buku_deskripsi' => $request->buku_deskripsi,
            ]);
            return redirect('/buku-kas')->with('completed', 'data tersimpan');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}