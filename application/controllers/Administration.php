<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');	
		$this->load->model("administration_model");
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){

			
			$data['noticias'] = $this->administration_model->select_all_news();
			$this->load->view('admin/components/head');
			$this->load->view('admin/components/nav');
			$this->load->view('admin/admin_main_view', $data);
			$this->load->view('admin/components/footer');	
		}else{
			redirect("/Administration/login", "refresh");
		}
		
	}

	public function login()
	{
		if($this->session->userdata('logged_in')){
			redirect('/Administration', 'refresh');
		}else{
			$this->load->view('admin/components/head');
			$this->load->view('admin/login/admin_login_view');
			$this->load->view('admin/components/footer');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/Administration/login","refresh");
	}

	public function submit(){
		$found = false;
		if($this->input->post('submit')){
			$user=$this->input->post('user');
			$pass=$this->input->post('password');
			$query = $this->administration_model->select_all_users();
			$requiredToken['records'] = $query->result() ;

			foreach ($requiredToken['records'] as $r) {
				if($user == $r->usuario && $pass == $this->encryption->decrypt($r->password)){
					$found = true;
					$sess_array = array('usuario' => $r->usuario,
										'tipo'=>$r->tipo);
					$this->session->set_userdata('logged_in', $sess_array);
					break;
				}
			}	

			if($found){
				redirect('/Administration', 'refresh');
			}else{
				echo "Not Registered";
			}
		}
	}

	public function generateKey(){
		$pass="YOUR_PASS";
		$pass = $this->encryption->encrypt($pass);
		echo $pass;
		echo "<br>";
		echo($this->encryption->decrypt("YOUR_KEY"));
	}


	public function nuevaNoticia(){
		if($this->session->userdata('logged_in')){
			$this->load->view('admin/components/head');
			$this->load->view('admin/components/nav');
			$this->load->view('admin/noticias/nueva_noticia');
			$this->load->view('admin/components/footer');	
		}else{
			redirect("/Administration/login", "refresh");
		}
	}


	public function editarNoticia(){
		if($this->session->userdata('logged_in')){
			$id = $this->uri->segment('3');
			$this->load->view('admin/components/head');
			$this->load->view('admin/components/nav');
			$this->load->view('admin/noticias/editar_noticia');
			$this->load->view('admin/components/footer');	
		}else{
			redirect("/Administration/login", "refresh");
		}
	}

}
