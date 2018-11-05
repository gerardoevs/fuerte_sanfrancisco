<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Main_model');
	}

	public function index()
	{
		$data['noticias'] = $this->Main_model->select_all_news();
		$data['noticias'] = $this->Main_model->select_all_news();
		$this->load->view('components/head');
		$this->load->view('components/nav');
		$this->load->view('main_view', $data);
		$this->load->view('components/footer');
	}
}
