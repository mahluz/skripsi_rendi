<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat_masuk extends Model
{
    protected $table ="surat_masuk";
    protected $primaryKey ="id_masuk";
    protected $fillable =[
    'no_surat',
    'hal',
    'dari',
    'kepada',
    'isi',
    'jabatan',
    'image_masuk'
    ];


}
