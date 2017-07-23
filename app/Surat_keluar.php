<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat_keluar extends Model
{
    protected $table ="Surat_keluar";
    protected $primaryKey ="id_keluar";
    protected $fillable =[
    'id_user',
    'id_kategori',
    'no_surat',
    'hal',
    'dari',
    'kepada',
    'isi',
    'tembusan',
    'disposisi',
    'status'
    ];
}
