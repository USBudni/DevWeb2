<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medias extends CI_Controller {

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
		$this->load->view('/medias/medias');
		$this->load->view('footer');
	}

	public function getMedias(){
		$this->load->model('Media_model');
		$medias = $this->Media_model->getMedias();
		header('Content-Type: application/json');
    	echo json_encode( $medias );
	}

	public function saveMedia(){
		$this->load->model('Media_model');
		$data = Array(
			'nome' => $this->input->post('nome'),
			'url_instagram' => $this->input->post('url_instagram'),
			'url_twitter' => $this->input->post('url_twitter'),
			'is_twitter' => $this->input->post('is_twitter'),
			'is_instagram' => $this->input->post('is_instagram'),
			'is_mentions' => $this->input->post('is_mentions'),
			'is_hashtags' => $this->input->post('is_hashtags'),
		);

		if($this->input->post('id')){
			$data['id'] = $this->input->post('id');
			$media = $this->Media_model->updateMedia(Array('media' => $data));
		}else{
			$media = $this->Media_model->saveMedia(Array('media' => $data));
		}

		$return = array();

		if($media){
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

	public function deleteMedia(){
		$this->load->model('Media_model');
		$media = $this->Media_model->deleteMedia(Array('id' => $this->input->post('id')));

		$return = array();

		if($media){
			$return = array('msg' => 'deleted');
		}else{
			$return = array('msg' => 'Ocorreu um erro');
		}

		header('Content-Type: application/json');
    	echo json_encode( $return );
	}
}