<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = array();
		$data['page'] = 'signup';
		//echo $this->request->getIPAddress();
		//$data['ip'] = $this->request->getIPAddress();//::1=127.0. 0.1
		echo view("templates/header", $data);
		echo view('hello', $data);
		echo view("templates/footer", $data);
	}

	public function sign_up_action(){
		if($this->request->getMethod() == 'post'){
			helper(['form']);
			$rules = [
				'user_fname'=>'required|alpha',
				'user_lname'=>'required|alpha',
				'user_email'=>'required|valid_email',
				'user_password'=>'required|min_length[8]'
			];
			if(!$this->validate($rules)){
				die("validation_error");
			}
			$data = array();
			$data = $this->request->getPost();
			$data['use_ip'] = $this->request->getIPAddress();
			$data['user_image'] = $this->request->getFile('user_image');
			$data['user_image']->move(ROOTPATH.'uploads/images/', $data['user_image']->getName());
			$data['user_image'] = $data['user_image']->getName();
			if($data['use_ip']=='::1'){
				$data['use_ip'] = '127.0. 0.1';
			}
			unset($data['submit']);
			$userModel = model("App\Models\UserModel");
			if($userModel->signup_save_data($data)){
				unset($data);
				die('signup_success');
			}else{
				unlink('./uploads/images/'.$data['user_image']);
				die("signup_fail");
			}
		}
	}

	public function login(){
		$data = array();
		$data['page'] = 'login';
		echo view("templates/header", $data);
		echo view("pages/login", $data);
		echo view("templates/footer", $data);
	}
	public function login_action(){
		if($this->request->getMethod() == 'post'){
			$rules = [
				"email" => 'required|valid_email',
				"password" => 'required|min_length[8]'
			];
			if(!$this->validate($rules)){
				die('validation_error');
			}
			$data = $this->request->getPost();
			unset($data['submit']);
			$userModel = model("App\Models\UserModel");
			if($data['password'] == $userModel->login_check($data['email'])[0]['user_password']){
				die("login");
			}else{
				die("cant_login");
			}
		}
	}

	public function chat(){
		$data = array();
		$data['page'] = 'chat';
		echo view("templates/header", $data);
		echo view("pages/chat", $data);
		echo view("templates/footer", $data);
	}
}
