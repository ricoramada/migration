<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggaran extends Model
{
  protected $table='pelanggaran';
  protected $primarykey='id';
  public $timestamps=false;
  protected $fillable=[
    'nama_pelanggaran',
    'kategori',
    'poin'
  ];
}
