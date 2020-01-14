<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelanggaran;
use App\siswa;
use Validator;

class pelanggarancontroller extends Controller
{
  public function store(Request $req)
  {
    $valid=Validator::make($req->all(),[
      'nama_pelanggaran'=>'required',
      'kategori'=>'required',
      'poin'=>'required'
    ]);
    if ($valid->fails()) {
      return Response()->json($valid->errors());
    }
    $simpan=pelanggaran::create([
      'nama_pelanggaran'=>$req->nama_pelanggaran,
      'kategori'=>$req->kategori,
      'poin'=>$req->poin
    ]);
    if ($simpan) {
      return Response()->json(['status'=> 1 , 'massage' => 'Pelanggaran ditambahkan']);
    }else {
      return Response()->json(['status'=> 0 , 'massage' => 'Kesalahan']);
    }
  }
  public function update(Request $req,$id)
  {
    $valid=Validator::make($req->all(),[
      'nama_pelanggaran'=>'required',
      'kategori'=>'required',
      'poin'=>'required'
    ]);
    if ($valid->fails()) {
      return Response()->json($valid->errors());
    }
    $simpan=pelanggaran::where('id',$id)->update([
      'nama_pelanggaran'=>$req->nama_pelanggaran,
      'kategori'=>$req->kategori,
      'poin'=>$req->poin
    ]);
    if ($simpan) {
      return Response()->json(['status'=> 1 , 'massage' => 'Pelanggaran telah diupdate']);
    }else {
      return Response()->json(['status'=> 0 , 'massage' => 'Kesalahan']);
    }
  }
  public function destroy($id)
  {
    $delete=pelanggaran::where('id',$id)->delete();
    if ($delete) {
      return Response()->json(['status'=> 1 , 'massage' => 'Telah dihapus']);
    }else {
      return Response()->json(['status'=> 0 , 'massage' => 'Kesalahan']);
    }
  }
  public function tampil_pelanggaran()
  {
    $tampil=pelanggaran::all();
    $hitung=pelanggaran::count();
    return Response()->json(['count'=> $hitung , 'pelanggaran' => $tampil]);
  }
  public function lihatpoin()
  {
    $hitung=count(
      $tampilan=siswa::join('pelanggaran','pelanggaran.id','siswa.id_pelanggaran')->get()
    );
    return Response()->json(['count'=>$hitung,'Pelanggaran'=>$tampilan]);
  }
}
