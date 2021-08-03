<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\TaModel;
use DB;

class TaController extends Controller
{
    public function index(){
        $ta = DB::table('tb_ta')
        ->leftJoin('tb_user','tb_user.id_user','=','tb_ta.id_user')
        ->orderBy('id_ta')
        ->get();
        return view('backend/pages/ta/index',compact('ta'));
    }

    public function create(){
        return view (
            'backend/pages/ta/form',
            [
                'url'=>'ta.store'
            ]
            );
    }

    public function store(Request $request, TaModel $ta){
        $validator = Validator::make($request->all(),[
            'id_user'=>'required',
            'judul_ta'=>'required',
            'tema_ta'=>'required',
            'deskripsi_ta'=>'required',
            'latar_belakang_ta'=>'required',
            'tujuan_penelitian_ta'=>'required',
            'rumusan_masalah_ta'=>'required',
            'metodologi_ta'=>'required',
            'matakuliah_ta'=>'required',
            'penelitian_ta'=>'required',
            'ipk_ta'=>'required'

        ]);

        if($validator->fails()){
            return redirect()
            ->route('ta.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $ta->id_user = $request->input('id_user');
            $ta->judul_ta = $request->input('judul_ta');
            $ta->tema_ta = $request->input('tema_ta');
            $ta->deskripsi_ta = $request->input('deskripsi_ta');
            $ta->latar_belakang_ta = $request->input('latar_belakang_ta');
            $ta->tujuan_penelitian_ta = $request->input('tujuan_penelitian_ta');
            $ta->rumusan_masalah_ta = $request->input('rumusan_masalah_ta');
            $ta->metodologi_ta = $request->input('metodologi_ta');
            $ta->matakuliah_ta = $request->input('matakuliah_ta');
            $ta->penelitian_ta = $request->input('penelitian_ta');
            $ta->ipk_ta = $request->input('ipk_ta');
            $ta->save();

            // $id=$ta->id_ta;
            // DB::table('tb_kriteria_wp')->insert([
            //     'id_ta'=>$id]);

            return redirect()
            ->route('ta')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(TaModel $ta){
        return view(
            'backend/pages/ta/form',compact('ta')
        );
    }

    public function update(Request $request,TaModel $ta){
        $validator = Validator::make($request->all(),[
            'id_user'=>'required',
            'judul_ta'=>'required',
            'tema_ta'=>'required',
            'deskripsi_ta'=>'required',
            'latar_belakang_ta'=>'required',
            'tujuan_penelitian_ta'=>'required',
            'rumusan_masalah_ta'=>'required',
            'metodologi_ta'=>'required',
            'matakuliah_ta'=>'required',
            'penelitian_ta'=>'required',
            'ipk_ta'=>'required'
        ]);

        if($validator->fails()){
            return redirect()
            ->route('ta.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $ta->id_user = $request->input('id_user');
            $ta->judul_ta = $request->input('judul_ta');
            $ta->tema_ta = $request->input('tema_ta');
            $ta->deskripsi_ta = $request->input('deskripsi_ta');
            $ta->latar_belakang_ta = $request->input('latar_belakang_ta');
            $ta->tujuan_penelitian_ta = $request->input('tujuan_penelitian_ta');
            $ta->rumusan_masalah_ta = $request->input('rumusan_masalah_ta');
            $ta->metodologi_ta = $request->input('metodologi_ta');
            $ta->matakuliah_ta = $request->input('matakuliah_ta');
            $ta->penelitian_ta = $request->input('penelitian_ta');
            $ta->ipk_ta = $request->input('ipk_ta');
            $ta->save();

            return redirect()
            ->route('ta')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(TaModel $ta){
        $id=$ta->id_ta;
        DB::table('tb_kriteria_wp')->where('id_ta',$id)->delete();
        $ta->forceDelete();
        return redirect()
        ->route('ta')
        ->with('message','Data Berhasil Dihapus');
    }
}
