<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\petugas;
use Validator;


class petugascontroller extends Controller
{
    public function store(Request $req)
    {
      $valid=Validator::make($req->all(),[
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
        'role'=>'required'
      ]);
      if ($valid->fails()) {
        return Response()->json($valid->errors());
      }
      $simpan=petugas::create([
        'name'=>$req->name,
        'email'=>$req->email,
        'password'=>$req->password,
        'role'=>$req->role
      ]);
      if ($simpan) {
        return Response()->json(['status'=> 1 , 'massage' => 'Petugas ditambahkan']);
      }else {
        return Response()->json(['status'=> 0 , 'massage' => 'Kesalahan']);
      }
    }
    public function update(Request $req,$id)
    {
      $valid=Validator::make($req->all(),[
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
        'role'=>'required'
      ]);
      if ($valid->fails()) {
        return Response()->json($valid->errors());
      }
      $simpan=petugas::where('id',$id)->update([
        'name'=>$req->name,
        'email'=>$req->email,
        'password'=>$req->password,
        'role'=>$req->role
      ]);
      if ($simpan) {
        return Response()->json(['status'=> 1 , 'massage' => 'Petugas telah diupdate']);
      }else {
        return Response()->json(['status'=> 0 , 'massage' => 'Kesalahan']);
      }
    }
    public function destroy($id)
    {
      $delete=petugas::where('id',$id)->delete();
      if ($delete) {
        return Response()->json(['status'=> 1 , 'massage' => 'Telah dihapus']);
      }else {
        return Response()->json(['status'=> 0 , 'massage' => 'Kesalahan']);
      }
    }
    public function tampil_petugas()
    {
      $tampil=petugas::all();
      $hitung=petugas::count();
      return Response()->json(['count'=> $hitung , 'Petugas' => $tampil]);
    }
}
