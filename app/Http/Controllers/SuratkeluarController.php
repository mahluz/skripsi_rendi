<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Requests;
use App\Kategori;
use App\Timeline;
use App\Surat_keluar;
use HTML2PDF;
use DB;
use PDO;
use DateTime;
use App\User;

class SuratkeluarController extends Controller
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
                'surat_keluar'=> 'active',
                'semua' =>'active',
            );

            $surat_keluar = null;
            if(Auth::user()->jabatan==1){

                $surat_keluar = DB::table('surat_keluar as a')
                ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

                ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
                ->where('a.disposisi' , 1)
                ->select("*")
                ->orderBy('id_keluar','desc')
                ->get();
            } else if (Auth::user()->jabatan==2){

                $surat_keluar = DB::table('surat_keluar as a')
                ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

                ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
                ->where('a.disposisi' , 2)
                ->select("*")
                ->orderBy('id_keluar','desc')
                ->get();
            }else if (Auth::user()->jabatan==3){

                $surat_keluar = DB::table('surat_keluar as a')
                ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

                ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
                ->where('a.disposisi' , 3)
                ->select("*")
                ->orderBy('id_keluar','desc')
                ->get();
            }else if (Auth::user()->jabatan==4){

                $surat_keluar = DB::table('surat_keluar as a')
                ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

                ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
                ->where('a.disposisi' , 4)
                ->select("*")
                ->orderBy('id_keluar','desc')
                ->get();
            } else {
                $surat_keluar = DB::table('surat_keluar as a')
                ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

                ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
                ->select("*")
                ->orderBy('id_keluar','desc')
                ->get();
            }


        return view ('surat_keluar.surat_keluar',['active'=> $active, 'surat_keluar' => $surat_keluar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $active = array(
            'surat_keluar' => 'active',
            );
        $users = DB::table('users as a')
            ->leftjoin('role as b', 'a.id_role' ,'=', 'b.id_role')
            ->select("*")
            ->where('a.id_role',2)
            ->get();
       


        return view('surat_keluar.create',['active' => $active, 'sub_judul' => 'Tambah surat Keluar']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $no_surat= DB::table('surat_keluar')->count();



        $Surat_keluar = Surat_keluar::create([
            'no_surat'=>$no_surat,
            'id_user'=>Auth::user()->id_user,
            'id_kategori'=> $request->id_kategori,
            'jabatan'=> $request->jabatan,
            'hal'=> $request->hal,
            'dari'=> $request->dari,
            'kepada'=> $request->kepada,
            'isi'=> $request->isi,
            'tembusan' => $request->tembusan,
            'disposisi'=> $request->disposisi,

            ]);
        return redirect('suratsaya')->with('berhasil', $Surat_keluar?"berhasil":"gagal");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $active = array(
            'surat_keluar' => 'active',
            );

        $surat_keluar = Surat_keluar::find($id);
         $no_surat = DB::table('surat_keluar')
            ->join('users','surat_keluar.id_user','=','users.id_user')
            ->join('prodi','users.prodi','=','prodi.prodi')
            ->where ('id_keluar',$id)
            ->first();

        return view('surat_keluar.show',[
            'active' => $active,
            'surat_keluar' => $surat_keluar,
            'sub_judul' => 'Detail surat_keluar',
            'surat'=> $no_surat
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

        $active = array(
            'surat_keluar' => 'active',
            );
        $kategori_surat= Surat_keluar::where('id_keluar',$id)->first();

        $surat_keluar = Surat_keluar::find($id);

        return view('surat_keluar.edit',[
            'active' => $active,
            'surat_keluar' => $surat_keluar,
            'sub_judul' => 'Edit surat Keluar',
            'kategori_surat' => $kategori_surat
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_rhs($id)
    {

        $active = array(
            'surat_keluar' => 'active',
            );

        $surat_keluar = Surat_keluar::find($id);


        return view('surat_keluar.edit_rhs',
          [
            'active' => $active,
            'surat_keluar' => $surat_keluar,
            'sub_judul' => 'Edit RHS surat Keluar'
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

        $surat_keluar = Surat_keluar::find($id);
        $status = $surat_keluar->update($request->all());



        return redirect("surat_keluar")->with('berhasil',$status?"berhasil":"gagal");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function verifykajur($id)
    {

        $status = DB::table('surat_keluar')->where('id_keluar',$id)->update(['disposisi'=>5]);



        return redirect("surat_keluar")->with('berhasil',$status?"berhasil":"gagal");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $status = DB::table('surat_keluar')->where('id_keluar',$id)->delete();



        return redirect("surat_keluar")->with('berhasil',$status?"berhasil":"gagal");
    }
    public function suratsaya()
    {

        $active = array(
                'surat_keluar'=> 'active',
                'semua' =>'active',
            );

            $surat_keluar = DB::table('surat_keluar as a')
            ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

            ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
            ->select("*")
             ->where('a.id_user',Auth::user()->id_user)
            ->get();


        return view ('surat_keluar.surat_keluar',['active'=> $active, 'surat_keluar' => $surat_keluar]);
    }
    public function penelitian()
    {

        $active = array(
            'surat_keluar' => 'active',
            );
        $users = DB::table('users as a')
            ->leftjoin('role as b', 'a.id_role' ,'=', 'b.id_role')
            ->select("*")
            ->where('a.id_role',2)
            ->get();
            // dd(Auth::user());
        $data=User::join('prodi','users.prodi','=','prodi.prodi')->where('id_user',Auth::user()->id_user)->first();
        // dd($data);

        return view('surat_keluar.penelitian',['active' => $active, 'sub_judul' => 'Tambah surat Keluar','data'=>$data]);
    }

     public function editpenelitian($id,$q)
    {
      // dd($id,$q);
        $active = array(
            'surat_keluar' => 'active',
            );
        $kategori_surat= Surat_keluar::where('id_keluar',$id)->first();

        $surat_keluar = DB::table('surat_keluar as a')
            ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')
            ->select("*")
             ->where('a.id_user',$q)
            ->get();
          
        return view('surat_keluar.editpenelitian',[
            'active' => $active,
            'surat_keluar' => $surat_keluar,
            'sub_judul' => 'Edit surat Keluar',
            'kategori_surat' => $kategori_surat
            ]);


      }
    public function cetak($id)
    {

         $active = array(
            'surat_keluar' => 'active',
            );

        $surat_keluar = Surat_keluar::find($id);


       $no_surat = DB::table('surat_keluar')
            ->join('users','surat_keluar.id_user','=','users.id_user')
            ->join('prodi','users.prodi','=','prodi.prodi')
            ->where ('id_keluar',$id)
            ->first();
            // dd($no_surat);
        return view('surat_keluar.print',[
            'active' => $active,
            'surat_keluar' => $surat_keluar,
            'nama' => Auth::user()->name,
            
            'surat' => $no_surat


            ]);
    }

    public function pkl()
    {

        $active = array(
            'surat_keluar' => 'active',
            );
        $users = DB::table('users as a')
            ->leftjoin('role as b', 'a.id_role' ,'=', 'b.id_role')
            ->select("*")
            ->where('a.id_role',2)
            ->get();

        return view('surat_keluar.pkl',['active' => $active, 'sub_judul' => 'Tambah surat Keluar']);
    }

     public function observasi()
    {

        $active = array(
            'surat_keluar' => 'active',
            );
        $users = DB::table('users as a')
            ->leftjoin('role as b', 'a.id_role' ,'=', 'b.id_role')
            ->select("*")
            ->where('a.id_role',2)
            ->get();

        return view('surat_keluar.observasi',['active' => $active, 'sub_judul' => 'Tambah surat Keluar', 'jenis_surat'=>'Surat Observasi']);
    }

    public function rhs()
    {

        $active = array(
            'surat_keluar' => 'active',
            );
        $users = DB::table('users as a')
            ->leftjoin('role as b', 'a.id_role' ,'=', 'b.id_role')
            ->leftjoin('prodi as c', 'a.prodi', "=", 'c.prodi')
            ->select("*")
            ->where('a.id_role',2)
            ->get();

        return view('surat_keluar.khs',['active' => $active, 'sub_judul' => 'Tambah surat Keluar']);
    }

    public function cetakkrs()
    {

        $active = array(
            'surat_keluar' => 'active',
            );
        $users = DB::table('users as a')
            ->leftjoin('role as b', 'a.id_role' ,'=', 'b.id_role')
            ->select("*")
            ->where('a.id_role',2)
            ->get();

        return view('surat_keluar.cetakkrs',['active' => $active, 'sub_judul' => 'Tambah surat Keluar']);
    }

    public function permohonan()
    {

        $active = array(
            'surat_keluar' => 'active',
            );
        $users = DB::table('users as a')
            ->leftjoin('role as b', 'a.id_role' ,'=', 'b.id_role')
            ->select("*")
            ->where('a.id_role',2)
            ->get();

        return view('surat_keluar.permohonan',['active' => $active, 'sub_judul' => 'Tambah surat Keluar']);
    }

    public function selectedSuratKeluarKajur($id){
      // return $id;
      $data['id']=$id;

      $active = array(
              'surat_keluar'=> 'active',
              'semua' =>'active',
          );

          $surat_keluar = null;
          if(Auth::user()->jabatan==1){

              $surat_keluar = DB::table('surat_keluar as a')
              ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

              ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
              ->where('a.disposisi' , 1)
              ->where('id_keluar',$id)
              ->select("*")
              ->orderBy('id_keluar','desc')
              ->get();
          } else if (Auth::user()->jabatan==2){

              $surat_keluar = DB::table('surat_keluar as a')
              ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

              ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
              ->where('a.disposisi' , 2)
              ->where('id_keluar',$id)
              ->select("*")
              ->orderBy('id_keluar','desc')
              ->get();
          }else if (Auth::user()->jabatan==3){

              $surat_keluar = DB::table('surat_keluar as a')
              ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

              ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
              ->where('a.disposisi' , 3)
              ->where('id_keluar',$id)
              ->select("*")
              ->orderBy('id_keluar','desc')
              ->get();
          }else if (Auth::user()->jabatan==4){

              $surat_keluar = DB::table('surat_keluar as a')
              ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

              ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
              ->where('a.disposisi' , 4)
              ->where('id_keluar',$id)
              ->select("*")
              ->orderBy('id_keluar','desc')
              ->get();
          } else {
              $surat_keluar = DB::table('surat_keluar as a')
              ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

              ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
              ->select("*")
              ->where('id_keluar',$id)
              ->orderBy('id_keluar','desc')
              ->get();
          }

      return view('surat_keluar.surat_keluar',['active'=> $active, 'surat_keluar' => $surat_keluar,'id'=>$id]);
    }


    /*public function Kategori()
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $active = array(
                'surat_keluar'=> 'active',
                'semua' =>'active',
            );

            $surat_keluar = DB::table('surat_keluar as a')
            ->leftjoin('users as b', 'a.id_user', '=', 'b.id_user')

            ->leftjoin('Kategori as d', 'a.id_kategori','=', 'd.id_kategori')
            ->select("*")
             ->where('a.id_kategori',''
            ->get();


        return view ('surat_keluar.surat_keluar',['active'=> $active, 'surat_keluar' => $surat_keluar]);
    }*/
}
