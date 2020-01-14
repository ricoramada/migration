<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table='siswa';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=[
      'nama_siswa',
      'nis',
      'tanggal_lahir',
      'umur',
      'kelas',
      'id_pelanggaran',
      'id_petugas'
    ];
}
