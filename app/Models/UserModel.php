<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public $timestamps =  false;
    protected $table = "tb_user";
    protected $primaryKey = "id_user";
    protected $fillable =[
        'nama_user',
        'username_user',
        'level_user',
        'nohp_user',
        'password_user',
        'kelas_user',
        'alamat_user'
    ];

    public function CheckLoginPengguna($username_user, $password_user)
    {
        $data_user = $this->where("username_user", $username_user)->get();
        if(count($data_user) == 1){
            if(Hash::check($password_user, $data_user[0]->password_user)){
                unset($data_user[0]->password_user);
                return $data_user[0];
            }
        }
        return false;
    }
}
