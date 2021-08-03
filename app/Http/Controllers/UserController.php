<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use session;
use DB;

class UserController extends Controller
{
    public function __construct(){
        $this->rules = [
            'username_user' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'password_user' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        ];
    }

    public function indexExt(){
        if(session('id_user') != null){

            $count = DB::table('tb_user')->where('level_user','mahasiswa')->count();
            $countta = DB::table('tb_ta')->count();

            return view('backend/home',compact('count','countta'))->with('message','Selamat Datang');

            // return view('backend/home')->with('message','Selamat Datang');
        }else{
            return view('backend/auth/index');
        }
    }

    public function aksilogin(Request $request){
        $validator = Validator::make($request->all(),$this->rules);
        if($validator->fails()){
            return back()->with('message','Silahkan Login Kembali');
        }else{
            $username_user = $request->username_user;
            $password_user = $request->password_user;

            $cek = DB::table('tb_user')->where('username_user',$username_user)->where('password_user',$password_user)->first();
            // dd($cek);
            if($cek == TRUE){
                $request->session()->put("id_user", $cek->id_user);
                $request->session()->put("nama_user",$cek->nama_user);
                return redirect()->route('home')->with('message','Selamat Datang');
            }else{
                return back()->with('message','Silahkan Login Kembali');
            }
        }
    }

    public function register()
    {
            return view('backend/auth/form');

    }

    public function aksiregister(Request $request){
        // dd($request->all());
        $validator = Validator ::make($request->all(),$this->rules);
        if($validator->fails()){
            return back()->with('error','Silahkan Login Kembali');
        }else{
            $isilevel ="mahasiswa";
            $user = new UserModel();
            $user->nama_user = $request->input('nama_user');
            $user->username_user = $request->input('username_user');
            $user->level_user = $isilevel;
            $user->kelas_user = $request->input('kelas_user');
            $user->nohp_user = $request->input('nohp_user');
            $user->alamat_user = $request->input('alamat_user');
            $user->password_user = $request->input('password_user');
            $user->save();
            return redirect("/")->with('pesan','Data Berhasil Disimpan');
        }
    }

    public function logout(Request $request){

        $request->session()->forget('id_user');
        $request->session()->forget('nama_user');
        $request->session()->flush();
        return redirect("/")->with('message','Sukses Logout.');
    }

    public function index(){
        $user = DB::table('tb_user')
        ->where('level_user','mahasiswa')
        ->orderBy('username_user')
        ->get();
        return view('backend/pages/user/index',compact('user'));
    }

    public function create(){
        return view (
            'backend/pages/user/form',
            [
                'url'=>'user.store'
            ]
            );
    }

    public function store(Request $request, UserModel $user){
        $validator = Validator::make($request->all(),[
            'nama_user'=>'required',
            'username_user'=>'required',
            'level_user'=>'required',
            'kelas_user'=>'required',
            'nohp_user'=>'required',
            'alamat_user'=>'required',
            'password_user'=>'required'

        ]);

        if($validator->fails()){
            return redirect()
            ->route('user.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $isilevel="mahasiswa";
            $user->nama_user = $request->input('nama_user');
            $user->username_user = $request->input('username_user');
            $user->level_user = $isilevel;
            $user->kelas_user = $request->input('kelas_user');
            $user->nohp_user = $request->input('nohp_user');
            $user->alamat_user = $request->input('alamat_user');
            $user->password_user = $request->input('password_user');
            $user->save();

            return redirect()
            ->route('user')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(UserModel $user){
        return view(
            'backend/pages/user/form',compact('user')
        );
    }

    public function update(Request $request,UserModel $user){
        $validator = Validator::make($request->all(),[
            'nama_user'=>'required',
            'username_user'=>'required',
            'level_user'=>'required',
            'kelas_user'=>'required',
            'nohp_user'=>'required',
            'alamat_user'=>'required',
            'password_user'=>'required'
        ]);

        if($validator->fails()){
            return redirect()
            ->route('user.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $isilevel="mahasiswa";
            $user->nama_user = $request->input('nama_user');
            $user->username_user = $request->input('username_user');
            $user->level_user = $isilevel;
            $user->kelas_user = $request->input('kelas_user');
            $user->nohp_user = $request->input('nohp_user');
            $user->alamat_user = $request->input('alamat_user');
            $user->password_user = $request->input('password_user');
            $user->save();

            return redirect()
            ->route('user')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(UserModel $user){
        $user->forceDelete();
        return redirect()
        ->route('user')
        ->with('message','Data Berhasil Dihapus');
    }
}
