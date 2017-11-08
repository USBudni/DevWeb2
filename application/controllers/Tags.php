<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller {

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
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('/tags/tags');
		$this->load->view('footer');
	}

	public function getTags(){
		$this->load->model('Tag_model');
		$tags = $this->Tag_model->getTags();
		header('Content-Type: application/json');
    	echo json_encode( $tags );
	}

	public function saveTag(){
		$this->load->model('Tag_model');
		$data = Array(
			'nome' => $this->input->post('nome'),
		);

		if($this->input->post('id')){
			$data['id'] = $this->input->post('id');
			$tag = $this->Tag_model->updateTag(Array('tag' => $data));
		}else{
			$tag = $this->Tag_model->saveTag(Array('tag' => $data));
		}

		$return = array();

		if($tag){
			if($this->input->post('id')){
				$return = array('msg' => 'updated');
			}else{
				$return = array('msg' => 'created');
			}
		}else{
			$return = array('msg' => 'Ocorreu um erro');
		}

		header('Content-Type: application/json');
    	echo json_encode( $return );
	}

	public function deleteTag(){
		$this->load->model('Tag_model');
		$tag = $this->Tag_model->deleteTag(Array('id' => $this->input->post('id')));

		$return = array();

		if($tag){
			$return = array('msg' => 'deleted');
		}else{
			$return = array('msg' => 'Ocorreu um erro');
		}

		header('Content-Type: application/json');
    	echo json_encode( $return );
	}
}
