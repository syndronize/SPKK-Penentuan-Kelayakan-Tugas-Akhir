<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaModel extends Model
{
    public $timestamps =  false;
    protected $table = "tb_ta";
    protected $primaryKey = "id_ta";
    protected $fillable =[
        'id_user',
        'judul_ta',
        'tema_ta',
        'deskripsi_ta',
        'latar_belakang_ta',
        'tujuan_penelitian_ta',
        'rumusan_masalah_ta',
        'metodologi_ta',
        'matakuliah_ta',
        'penelitian_ta',
        'ipk_ta',
        'nilai_final_kriteria_wp',
        'nilai_final_kriteria_saw'
    ];
}
