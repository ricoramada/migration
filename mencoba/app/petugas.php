<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table='petugas';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=[
      'name',
      'email',
      'password',
      'role'
    ];
}
