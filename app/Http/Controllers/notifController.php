<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Surat_keluar;

class notifController extends Controller
{
    public function index(){
      $request=Input::all();

      $data=Surat_keluar::join('users','surat_keluar.id_user','=','users.id_user')->where('disposisi',$request['disposisi'])->get();

      return Response::json($data);
    }
}
