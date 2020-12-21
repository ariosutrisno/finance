<?php

namespace App\Http\Controllers\api\bukukas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

use App\Http\Repositories\KategoriRepository;
use Illuminate\Support\Facades\Auth;
class kategoriController extends ApiController
{
    protected $kategori;

    public function __construct(KategoriRepository $kategori)
    {
        $this->kategori = $kategori;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idx_kategori)
    {
        $user_id = Auth::id();
        $getkategori = $this->kategori->getkategori($idx_kategori, $user_id);
        if (collect($getkategori)->count()) {
            return $this->sendResponse(0, 19, $getkategori);
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
        $user_id = Auth::id();
        $kategoricreate = $this->kategori->tambahKategori($request,$user_id);
        if ($kategoricreate) {
            return $this->sendResponse(0, "Berhasil", []);
        } else {
            return $this->sendError(2, 'Error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
