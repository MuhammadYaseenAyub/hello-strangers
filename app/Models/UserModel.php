<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function index()
    {

    }

    public function signup_save_data($data){
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->insert($data);
        $query = $db->affectedRows();
        if ($query)
            return true;
        else
            return false;
    }

    public function login_check($data){
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->select("*")->where('user_email',$data);
        return $builder->get()->getResultArray();
    }

    public function logined_in_members(){
        $db = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->select("*")->where('login_flag',1);
        return $builder->get()->getResultArray();
    }

}