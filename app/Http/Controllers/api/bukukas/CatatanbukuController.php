<?php

namespace App\Http\Controllers\api\bukukas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\CatatanbukuRepository;
use App\Http\Repositories\BukuKasRepository;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
class CatatanbukuController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $catatan;

    public function __construct(CatatanbukuRepository $catatan)
    {
        $this->catatan = $catatan;
    }
    public function index($idx_buku_kas)
    {
        $getlistcatatan = $this->catatan->listcatatan($idx_buku_kas);
        if (collect($getlistcatatan)) {
            return $this->sendResponse(0, 19, $getlistcatatan);
        } else {
            return $this->sendResponse(0, 19, []);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users_id = Auth::id();
        $thisData = [
            'idx_buku_kas' => $request->idx_buku_kas,
            'idx_kategori' => $request->idx_kategori,
            'idx_sub_kategori' => $request->idx_sub_kategori,
            'catatan_jumlah' => $request->catatan_jumlah,
            'catatan_jam'  => $request->catatan_jam,
            'catatan_tgl'  => $request->catatan_tgl,
            'catatan_keterangan'  => $request->catatan_keterangan,
        ];
        $save_catatan = $this->catatan->createcatatan($users_id, $thisData);

        if ($save_catatan) {
            return $this->sendResponse(0, "Berhasil", $thisData);
        } else {
            return $this->sendError(2, 'Error');
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
    public function delete(Request $request,$idx_catatan_buku)
    {
        $user_id = Auth::id();
        $delete_catatan = $this->catatan->deletecatatan($request, $idx_catatan_buku,$user_id);

        if ($delete_catatan) {
            return $this->sendResponse(0, "Berhasil", $delete_catatan);
        } else {
            return $this->sendError(2, 'Error');
        }
    }
}
