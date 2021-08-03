<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use App\Models\TaModel;
use DB;

class HomeController extends Controller
{
    public function count()
    {
        $count = DB::table('tb_user')->where('level_user','mahasiswa')->count();
        $countta = DB::table('tb_ta')->count();

        return view('backend/home',compact('count','countta'));
    }
}
