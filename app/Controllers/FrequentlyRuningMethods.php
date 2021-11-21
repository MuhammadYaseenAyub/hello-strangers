<?php

namespace App\Controllers;

class FrequentlyRuningMethods extends BaseController
{
	public function index()
	{
		
	}

	public function getLogedInMembersInfo(){
        //logined_in_members
        $userModel = model('App\Models\UserModel');
        $data = $userModel->logined_in_members();
        //return $this->response
    }
}
