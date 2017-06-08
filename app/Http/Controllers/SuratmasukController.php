<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Image\Facades\Image;

use App\Surat_masuk;
use DB;
use App\Http\Requests;



class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {  
         if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $active = array(
                'surat_masuk'=> 'active',
            );
        $surat_masuk = Surat_masuk::all();

        return view ('surat_masuk.surat_masuk',['active'=> $active, 'surat_masuk' => $surat_masuk]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $active = array(
            'surat_masuk' => 'active',
            );
        return view('surat_masuk.create',['active' => $active, 'sub_judul' => 'Tambah surat masuk']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
      $this->validate($request, [
            
            'no_surat'=> 'required',
           
            'dari'=>'required',
            'isi'=>'required',
            'image_masuk' => 'image|max:4048'

        ]);


        $path = public_path('upload/suratmasuk');
        $input = $request->except('image_masuk');

        $image = Input::file('image_masuk');
        if ($image !== null) {

            $upload = new Surat_masuk();
            //if($request->hasFile('image_masuk')) {
                $upload->no_surat = $request->no_surat;
                $upload->hal = $request->hal;
                $upload->dari = $request->dari;
                $upload->kepada =$request->kepada;
                $upload->isi = $request->isi;
                $upload->jabatan = $request ->jabatan;
                $upload->image_masuk = $request->file('image_masuk')->getClientOriginalName();
                $request->file('image_masuk')->move($path, $upload->image_masuk);
                $upload->save();

                return redirect('surat_masuk')->with('berhasil',$upload?"berhasil":"gagal");
        } else {
            $upload = new Surat_masuk();
            //if($request->hasFile('image_masuk')) {
                $upload->no_surat = $request->no_surat;
                $upload->hal = $request->hal;
                $upload->dari = $request->dari;
                $upload->kepada =$request->kepada;
                $upload->isi = $request->isi;
                $upload->jabatan = $request ->jabatan;
                $upload->save();

                return redirect('surat_masuk')->with('berhasil',$upload?"berhasil":"gagal");
        }

        //}; 

/*$this->validate($request, [
'no_surat' => 'required',
'dari' => 'required',
'isi' => 'required',
'image_masuk' => 'required'
]);

$upload = new Surat_masuk();

$image = Input::file('image_masuk');

if ($image !== null) {
$filename = $upload->id. '.' . $image->getClientOriginalExtension(); //ini untuk buat nama filenya, saya umpamakan generate dengan id dari data di table upload
$path = 'upload/suratmasuk'.$filename; //ini path file di folder public/images/upload
Image::make($image->getRealPath())->fit(300,200)->save($path); //ini untuk save imagenya ke dalam folder public
$upload->image_masuk = 'images/avatar/'.$filename; //ini string yang akan disimpan di database
}

$upload->no_surat = $request->no_surat;
$upload->hal = $request->hal;
$upload->dari = $request->dari;
$upload->kepada = $request->kepada;
$upload->isi = $request->isi;
$upload->tembusan = $request->tembusan;

$upload->save();

return redirect('surat_masuk')->with('berhasil', $upload? 'berhasil':'gagal');
*/
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $active = array(
            'surat_masuk' => 'active',
            );

        $surat_masuk = Surat_masuk::find($id);

        return view('surat_masuk.show',[
            'active' => $active, 
            'surat_masuk' => $surat_masuk, 
            'sub_judul' => 'Detail surat_masuk'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $active = array(
            'surat_masuk' => 'active',
            );

        $surat_masuk = Surat_masuk::find($id);

        return view('surat_masuk.edit',[
            'active' => $active, 
            'surat_masuk' => $surat_masuk, 
            'sub_judul' => 'Edit surat masuk'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $surat_masuk = Surat_masuk::find($id);
        $status = $surat_masuk->update($request->all());
        
        

        return redirect("surat_masuk")->with('berhasil',$status?"berhasil":"gagal");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $status = DB::table('surat_masuk')->where('id_masuk',$id)->delete();

    

        return redirect("surat_masuk")->with('berhasil',$status?"berhasil":"gagal");
    }
    public function tembusan()
    {
        
        $active = array(
                'surat_masuk'=> 'active',
                'semua' =>'active',
            );
       
            $surat_masuk = DB::table('surat_masuk as a')
            
            
            ->leftjoin('users as b', 'a.jabatan','=', 'b.jabatan')
            ->select("*")
             ->where('b.jabatan',Auth::user()->jabatan)
            ->get();


        return view ('surat_masuk.surat_masuk',['active'=> $active, 'surat_masuk' => $surat_masuk]);
    }
}
