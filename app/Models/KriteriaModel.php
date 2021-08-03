<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    public $timestamps =  false;
    protected $table = "tb_kriteria_wp";
    protected $primaryKey = "id_kriteria";
    protected $fillable =[
        'id_user',
        'id_ta',
        'originalitas_kriteria',
        'sasaran_kriteria',
        'metodologi_kriteria',
        'kemiripan_kriteria',
        'ipk_kriteria',
        'nilai_final_kriteria',
    ];
}
