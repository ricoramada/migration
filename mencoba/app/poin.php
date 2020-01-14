<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class poin extends Model
{
  protected $table='poin_siswa';
  protected $primarykey='id';
  public $timestamps=false;
  protected $fillable=[
    'id_pelanggaran',
    'id_siswa',
    'keterangan',
    'id_petugas'
  ];
}
