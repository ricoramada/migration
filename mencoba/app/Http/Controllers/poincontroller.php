<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\pelanggaran;
use App\petugas;
use App\poin;
use App\siswa;

class poincontroller extends Controller
{
  public function store(Request $request)
  {
      poin::create($request->all());

      $pelanggaran = $request->id_pelanggaran;
      $petugas = $request->id_petugas;
      $siswa = $request->id_siswa;

      return Response()->json(['id_pelanggaran'=>$id_pelanggaran,'id_siswa'=>$id_siswa,'id_petugas'=>$id_petugas]);
  }
}
