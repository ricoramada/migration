<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\pelanggaran;
use Validator;

class siswacontroller extends Controller
{
    public function store(Request $req)
    {
      $valid=Validator::make($req->all(),
        [
          'nama_siswa'=>'required',
          'nis'=>'required',
          'tanggal_lahir'=>'required',
          'umur'=>'required',
          'kelas'=>'required'
        ]
      );
      if ($valid->fails()) {
        return Response()->json($valid->errors());
      }
      $save=siswa::create([
        'nama_siswa'=>$req->nama_siswa,
        'nis'=>$req->nis,
        'tanggal_lahir'=>$req->tanggal_lahir,
        'umur'=>$req->umur,
        'kelas'=>$req->kelas,
        'id_pelanggaran'=>$req->id_pelanggaran,
        'id_petugas'=>$req->id_petugas
      ]);
      if ($save) {
        return Response()->json(['status' => 1, 'massage' => 'Siswa ditambahkan']);
      } else {
        return Response()->json(['status' => 0, 'massage' => 'Kesalahan']);
      }
    }
    public function update(Request $req,$id)
    {
      $valid=Validator::make($req->all(),
        [
          'nama_siswa'=>'required',
          'nis'=>'required',
          'tanggal_lahir'=>'required',
          'umur'=>'required',
          'kelas'=>'required'
        ]
      );
      if ($valid->fails()) {
        return Response()->json($valid->errors());
      }
      $save=siswa::where('id',$id)->update([
        'nama_siswa'=>$req->nama_siswa,
        'nis'=>$req->nis,
        'tanggal_lahir'=>$req->tanggal_lahir,
        'umur'=>$req->umur,
        'kelas'=>$req->kelas
      ]);
      if ($save) {
        return Response()->json(['status' => 1, 'massage' => 'Siswa telah diupdate']);
      } else {
        return Response()->json(['status' => 0, 'massage' => 'Kesalahan']);
      }
    }
    public function destroy($id)
    {
      $delete=siswa::where('id',$id)->delete();
      if ($delete) {
        return Response()->json(['status'=> 1 , 'massage' => 'Telah dihapus']);
      }else {
        return Response()->json(['status'=> 0 , 'massage' => 'Kesalahan']);
      }
    }
    public function tampil_siswa()
    {
      $tampil=siswa::all();
      $hitung=siswa::count();
      return Response()->json(['count'=> $hitung , 'siswa' => $tampil]);
    }
    public function poin()
    {
      $data_user=siswa::get();
      $arr_data=array();
      foreach($data_user as $dt_user){
          $ok=pelanggaran::join('siswa','siswa.id','pelanggaran.id_siswa',$dt_user->id)->get();
          $arr_pelanggaran=array();
          foreach($ok as $ok){
              $arr_pelanggaran[]=array(
                'nama_pelanggaran'=>$ok->nama_pelanggaran,
                'kategori'=>$ok->kategori,
                'poin'=>$ok->poin
              );
          }
          $arr_data[]=array(
            'nama_siswa'=>$dt_user->nama_siswa,
            'nis'=>$dt_user->nis,
            'tanggal_lahir'=>$dt_user->tanggal_lahir,
            'umur'=>$dt_user->umur,
            'kelas'=>$dt_user->kelas
          );
      return Response()->json($arr_data);
      }
    }
}
