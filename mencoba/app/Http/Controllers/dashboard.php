<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswa;
use App\pelanggaran;
use App\petugas;

class dashboard extends Controller
{
    public function data()
    {
      $siswa = siswa::all();
      $pelanggaran = pelanggaran::all();
      $petugas = petugas::all();
      $array=[
        $siswa,
        $pelanggaran,
        $petugas
      ];
      $jumlah = count($array);
      return Response()->json(['Jumlah Semua Data'=>$jumlah,'Data Siswa'=>$siswa,'Data Pelanggaran'=>$pelanggaran,'Data Petugas'=>$petugas]);
    }
}
