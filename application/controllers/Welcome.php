<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function register($id = NULL){
		$media = Array();
		if($id != null){
			$this->load->model('Media_model');
			$media = $this->Media_model->getMedia(Array('id' => $id));
			var_dump($media);
		}

		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('/register/register', Array('media' => $media));
		$this->load->view('footer');
	}

}