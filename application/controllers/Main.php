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
		$this->load->library('Mobile_Detect');
	}

	public function index()
	{
		
		$detect = new Mobile_Detect();
		if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS() || $detect->isiOS()) {
	        header("Location: ".$this->config->item('base_url')."/Main/mobile"); exit;
	    }else{
	    	$data['portadas'] = $this->Main_model->select_all_portadas();
	    	$data['noticiapar'] = $this->Main_model->select_even_news();
			$data['noticiainpar'] = $this->Main_model->select_odd_news();
			$this->load->view('components/head-clean');
			$this->load->view('components/nav');
			$this->load->view('main_view', $data);
			$this->load->view('components/footer');
	    }

	}


	public function mobile(){

		$detect = new Mobile_Detect();
		if ($detect->isMobile() || $detect->isTablet() || $detect->isAndroidOS() || $detect->isiOS()) {
			$data['portadas'] = $this->Main_model->select_all_portadas();
			$data['noticias'] = $this->Main_model->select_all_news();
			$this->load->view('components/head');
			$this->load->view('components/nav');
			$this->load->view('mobile/main_view_mobile', $data);
			$this->load->view('components/footer');
	        
	    }else{
	    	header("Location: ".$this->config->item('base_url')); exit;
	    }

		
	}

	public function noticia(){
		$id = $this->uri->segment('3');
		$data['noticia'] = $this->Main_model->cargarNoticia($id);
		if(empty($data['noticia'])){
			redirect("/", "refresh");
		}else{
			$this->load->view('components/head-clean');
			$this->load->view('components/nav');
			$this->load->view('noticia_view', $data);
			$this->load->view('components/footer');
		}
		
	}

	public function noticias(){

		$this->load->library('pagination');
        $limit_per_page = 15;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->Main_model->get_total_news();

        $data["noticias"] = $this->Main_model->get_current_page_records_news($limit_per_page, $start_index);

		$config['base_url'] = base_url('main/noticias');
		$config['total_rows'] = $total_records;
		$config['per_page'] = $limit_per_page;

		$this->pagination->initialize($config);

		$data['links']=$this->pagination->create_links();

		$this->load->view('components/head-clean');
		$this->load->view('components/nav');
		$this->load->view('noticias_todas_view', $data);
		$this->load->view('components/footer');
	}

	public function galeria(){

		$this->load->view('components/head-clean');
		$this->load->view('components/nav');
		$this->load->view('galeria_view');
		$this->load->view('components/footer');
		
	}

	public function historia(){

		$this->load->view('components/head-clean');
		$this->load->view('components/nav');
		$this->load->view('historia_view');
		$this->load->view('components/footer');
		
	}

	public function directo(){
		if($this->Main_model->checkLive()){
			$data['listaDirecto'] = $this->Main_model->select_directo();
			$this->load->view('components/head-clean');
			$this->load->view('components/nav');
			$this->load->view('directo_view',$data);
			$this->load->view('components/footer');
		}else{
			redirect("/", "refresh");
			
		}
		
		
	}

}
