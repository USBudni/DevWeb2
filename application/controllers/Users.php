<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->model('User_model');
		$users = $this->User_model->getData();
		//echo $string;
		//var_dump($users);
	
		$this->load->view('/login/login', Array('users' => $users));
	}

	public function login(){		
		$this->load->model('User_model');

		$user = $this->User_model->getUser(Array('login' => $this->input->post('login'), 'pass' => md5($this->input->post('pass'))));
		$return = array();		
		
		if($user){
			$return = array('msg' => 'logged');
		}else{			
			$return = array('msg' => 'Login e/ou senha incorretos!');
		}

		header('Content-Type: application/json');
    	echo json_encode( $return );
	}

	public function recoverPass(){
		$this->load->model('User_model');

		$user = $this->User_model->recoverPass(Array('login' => $this->input->post('login')));

		$return = array();

		if($user){
			$return = array('msg' => 'updated');
		}else{
			$return = array('msg' => 'Ocorreu um erro');
		}

		header('Content-Type: application/json');
    	echo json_encode( $return );
	}

	public function createUser(){
		$this->load->model('User_model');

		$user = $this->User_model->createUser(Array('login' => $this->input->post('login')));

		$return = array();

		if($user){
			$return = array('msg' => 'created');
		}else{
			$return = array('msg' => 'Ocorreu um erro');
		}

		header('Content-Type: application/json');
    	echo json_encode( $return );
	}
}