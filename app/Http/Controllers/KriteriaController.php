<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\KriteriaModel;
use App\Models\TaModel;
use App\Models\UserModel;
use DB;

class KriteriaController extends Controller
{
    public function index(){
        $kriteria = DB::table('tb_kriteria_wp')
        ->leftJoin('tb_user','tb_user.id_user','=','tb_kriteria_wp.id_user')
        ->leftJoin('tb_ta','tb_ta.id_ta','=','tb_kriteria_wp.id_ta')
        ->orderBy('id_kriteria')
        ->get();

        $maxc1=DB::table('tb_kriteria_wp')->max('originalitas_kriteria');
        $maxc2=DB::table('tb_kriteria_wp')->max('sasaran_kriteria');
        $maxc3=DB::table('tb_kriteria_wp')->max('metodologi_kriteria');
        $minc4=DB::table('tb_kriteria_wp')->min('kemiripan_kriteria');
        $maxc5=DB::table('tb_kriteria_wp')->max('ipk_kriteria');

        foreach($kriteria as $no => $row){
            //SAW
            // Pembobotan
            $c1 = 0.25;
            $c2 = 0.45;
            $c3 = 0.15;
            $c4 = 0.05;
            $c5 = 0.1;

            // // Penilaian
            $nilaic1_saw = ($row->originalitas_kriteria != null ? $row->originalitas_kriteria/$maxc1 : 0);
            $nilaic2_saw = ($row->sasaran_kriteria != null ? $row->sasaran_kriteria/$maxc2 : 0);
            $nilaic3_saw = ($row->metodologi_kriteria != null ? $row->metodologi_kriteria/$maxc3 : 0);
            $nilaic4_saw = ($row->kemiripan_kriteria != null ? $minc4/$row->kemiripan_kriteria : 0);
            $nilaic5_saw = ($row->ipk_kriteria != null ? $row->ipk_kriteria/$maxc5 : 0);
            // $nilai=([$nilaic1,$nilaic2,$nilaic3,$nilaic4,$nilaic5]);
            // dd($nilai);

            $nilaiakhir_saw=($nilaic1_saw*$c1)+($nilaic2_saw*$c2)+($nilaic3_saw*$c3)+($nilaic4_saw*$c4)+($nilaic5_saw*$c5);
            // dd($nilaiakhir);

            // WP
            //Pembobotan
            $bobotc1 = $c1/($c1+$c2+$c3+$c4+$c5);
            $bobotc2 = $c2/($c1+$c2+$c3+$c4+$c5);
            $bobotc3 = $c3/($c1+$c2+$c3+$c4+$c5);
            $bobotc4 = -($c4/($c1+$c2+$c3+$c4+$c5));
            $bobotc5 = $c5/($c1+$c2+$c3+$c4+$c5);

            $s1 = ($row->originalitas_kriteria != null ? pow($row->originalitas_kriteria,$bobotc1) : 0);
            $s2 = ($row->sasaran_kriteria != null ? pow($row->sasaran_kriteria,$bobotc2) : 0);
            $s3 = ($row->metodologi_kriteria != null ? pow($row->metodologi_kriteria,$bobotc3) : 0);
            $s4 = ($row->kemiripan_kriteria != null ? pow($row->kemiripan_kriteria,$bobotc4) : 0);
            $s5 = ($row->ipk_kriteria != null ? pow($row->ipk_kriteria,$bobotc5) : 0);
            // dd($s1);

            $nilaiakhir_wp=($s1*$s2*$s3*$s4*$s5);
            // dd($nilaiakhir_wp);

            $save=DB::table('tb_kriteria_wp')->where('id_kriteria', $row->id_kriteria)
            ->update([
                'nilai_final_kriteria_wp' =>$nilaiakhir_wp,
                'nilai_final_kriteria_saw' =>$nilaiakhir_saw]);
        }
        return view('backend/pages/kriteria/index',compact('kriteria'));
    }

    public function create($id){

        // dd($id);
        $ta = DB::table('tb_ta')->first();

        $ipk = DB::table('tb_ta')
        ->where('id_ta',$id)
        ->first();
        // dd($ipk);
        return view (
            'backend/pages/kriteria/form',
            [
                'url'=>'kriteria.store',
                'ta'=>$ta,
                'id_ta'=>$id,
                'ipk_ta'=>$ipk
                ]
            );
    }

    public function store(Request $request, KriteriaModel $kriteria){
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'id_user'=>'required',
            'id_ta'=>'required',
            'originalitas_kriteria'=>'required',
            'sasaran_kriteria'=>'required',
            'metodologi_kriteria'=>'required',
            'kemiripan_kriteria'=>'required',
            'ipk_kriteria'=>'required',

        ]);

        if($validator->fails()){
            return redirect()
            ->route('kriteria.create',$request->id_ta)
            ->withErrors($validator)
            ->withInput();
        }else{
            $kriteria->id_user = $request->input('id_user');
            $kriteria->id_ta = $request->input('id_ta');
            $kriteria->originalitas_kriteria = $request->input('originalitas_kriteria');
            $kriteria->sasaran_kriteria = $request->input('sasaran_kriteria');
            $kriteria->metodologi_kriteria = $request->input('metodologi_kriteria');
            $kriteria->kemiripan_kriteria = $request->input('kemiripan_kriteria');
            $kriteria->ipk_kriteria = $request->input('ipk_kriteria');
            $kriteria->save();

            return redirect()
            ->route('kriteria')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(KriteriaModel $kriteria){
        return view(
            'backend/pages/kriteria/form',compact('kriteria')
        );
    }

    public function update(Request $request,KriteriaModel $kriteria){
        $validator = Validator::make($request->all(),[
            'id_user'=>'required',
            'id_ta'=>'required',
            'originalitas_kriteria'=>'required',
            'sasaran_kriteria'=>'required',
            'metodologi_kriteria'=>'required',
            'kemiripan_kriteria'=>'required',
            'ipk_kriteria'=>'required',
            'nilai_final_kriteria'=>'required'
        ]);

        if($validator->fails()){
            return redirect()
            ->route('kriteria.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $kriteria->id_user = $request->input('id_user');
            $kriteria->id_ta = $request->input('id_ta');
            $kriteria->originalitas_kriteria = $request->input('originalitas_kriteria');
            $kriteria->sasaran_kriteria = $request->input('sasaran_kriteria');
            $kriteria->metodologi_kriteria = $request->input('metodologi_kriteria');
            $kriteria->kemiripan_kriteria = $request->input('kemiripan_kriteria');
            $kriteria->ipk_kriteria = $request->input('ipk_kriteria');
            $kriteria->nilai_final_kriteria = $request->input('nilai_final_kriteria');
            $kriteria->save();

            return redirect()
            ->route('kriteria')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(KriteriaModel $kriteria){
        $kriteria->forceDelete();
        return redirect()
        ->route('kriteria')
        ->with('message','Data Berhasil Dihapus');
    }
}
