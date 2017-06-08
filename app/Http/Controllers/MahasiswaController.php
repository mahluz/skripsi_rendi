<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\User;
use App\Timeline;
use DB;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->id_role!=1) {
            return redirect('404');
        }
        $active = array(
            'pengguna' => 'active',
            'mahasiswa' => 'active',
            );
        $users = DB::table('users')
            ->where('id_role',3)
            ->get();

        return view('mahasiswa.mahasiswa',['active' => $active, 'users' => $users]);
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
            'pengguna' => 'active',
            'mahasiswa' => 'active',
            );

        return view('mahasiswa.create',['active' => $active, 'sub_judul' => 'Tambah mahasiswa']);
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
            'name' => 'required|max:255',
            'no_id' => 'required|min:6|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'no_id' => $request->no_id,
            'prodi' =>$request->prodi,
            'email' => $request->email,
            'id_role' => 3,
            'password' => bcrypt($request->password),
            'image' => 'dist/img/noprofile.gif',
            'status' => 1
        ]);

        Timeline::create([
            'id_user' => Auth::user()->id_user,
            'aksi' => 'Melakukan penambahan mahasiswa baru',
            'href' => 'mahasiswa/'.$user->id_user
        ]);

        return redirect('mahasiswa')->with('berhasil',$user?"berhasil":"gagal");
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
            'pengguna' => 'active',
            'mahasiswa' => 'active',
            );
        $user = User::find($id);

        return view('mahasiswa.show',[
            'active' => $active, 
            'user' => $user, 
            'sub_judul' => 'Detail mahasiswa'
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
            'pengguna' => 'active',
            'mahasiswa' => 'active',
            );

        $user = User::find($id);

        return view('mahasiswa.edit',[
            'active' => $active, 
            'user' => $user, 
            'sub_judul' => 'Edit mahasiswa'
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
        
        $old = User::find($id);
        if ($request->no_id != $old->no_id) {
            $user = DB::table('users')
                ->where([
                    ['no_id',$request->no_id],
                    ['id_user','!=',$old->id_user]
                    ])
                ->first();
            if ($user) {
                return redirect("mahasiswa/".$id."/edit")->withErrors(['no_id' => 'Nomor pegawai sudah digunakan']);
            }
        }
        
        if(isset($request->password)){
            $this->validate($request, [
                'password' => 'required|min:6|confirmed'
            ]);
        }

        $user = User::find($id);
        $status = $user->update($request->all());
        
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
            $user->save();
        }
        
        Timeline::create([
            'id_user' => Auth::user()->id_user,
            'aksi' => 'Melakukan perubahan data mahasiswa',
            'href' => 'mahasiswa/'.$user->id_user
        ]);

        return redirect("mahasiswa")->with('berhasil',$status?"berhasil":"gagal");
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
        $status = DB::table('users')->where('id_user',$id)->delete();

        Timeline::create([
            'id_user' => Auth::user()->id_user,
            'aksi' => 'Menghapus data mahasiswa',
            'href' => ''
        ]);

        return redirect("mahasiswa")->with('berhasil',$status?"berhasil":"gagal");
    }
}
