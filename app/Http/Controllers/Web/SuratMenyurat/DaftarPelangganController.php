<?php

namespace App\Http\Controllers\Web\SuratMenyurat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dashboard\SuratMenyurat\DaftarPelanggan;
use Illuminate\Support\Facades\Auth;

/**
 * DB Alan Finenance
 */

class DaftarPelangganController extends Controller
{
    public function index()
    {
        
        $user_id = auth::id();
        $data = DaftarPelanggan::where('user_id','=',$user_id)->where('status','=','aktif')->paginate(10);
        return view('dashboard.daftar-pelanggan.index',compact('data','user_id'));
    }
    public function create(){

        return view('dashboard.daftar-pelanggan.create');
    }
    public function store(Request $request){
        // dd($request->all());
            $user_id = auth::id();
            $coba = DaftarPelanggan::insert([
                'user_id' => $user_id,
                'pelanggan_nama' => $request->name,
                'pelanggan_alamat' => $request->alamat,
                'pelanggan_email' => $request->email,
                'pelanggan_telepon' => $request->telepon,
                'perusahaan' => $request->perusahaan,
            ]);
        
        return redirect('daftar-pelanggan');
    }

    public function update(Request $request){
        $user_id = auth::id();
        $coba = DaftarPelanggan::where('idx_pelanggan',$request->idx_pelanggan)->update([
            'user_id' => $user_id,
            'pelanggan_nama' => $request->name,
            'pelanggan_alamat' => $request->alamat,
            'pelanggan_email' => $request->email,
            'pelanggan_telepon' => $request->telepon,
            'perusahaan' => $request->perusahaan,
        ]);
        return redirect('daftar-pelanggan');
    }
    public function edit($idx_pelanggan){
        $user_id = auth::id();
        $data = DaftarPelanggan::find($idx_pelanggan);
        return view('dashboard.daftar-pelanggan.edit',compact('user_id','data'));
    }
    public function delete($idx_pelanggan){
        $user_id = Auth::id();
        DaftarPelanggan::where('idx_pelanggan', '=', $idx_pelanggan)->where('user_id','=',$user_id)->update(['status' => 'nonaktif']);
        return redirect()->back();

    }
    public function search(Request $request){

        
    }
    
}