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

	public function publicarNoticia(){
		if($this->session->userdata('logged_in')){
			if(isset($_POST['submit'])){
				if ($_FILES['portada']['name']!="") {
					if($_FILES['portada']['type']=='image/jpeg' || $_FILES['portada']['type']=='image/png' || $_FILES['portada']['type']=='image/jpg'){
						$this->form_validation->set_rules('titulo', 'Titulo de noticia', 'required');
						$this->form_validation->set_rules('descripcion', 'Descripcion de noticia', 'required');
						$this->form_validation->set_rules('articulo', 'Articulo de noticia', 'required');
			        	if ($this->form_validation->run() == FALSE)
			        	{
			        		$this->load->view('admin/components/head');
							$this->load->view('admin/noticias/exceptions/form_validation_error');
							$this->load->view('admin/components/footer');
			        	}else{
			        		$Titulo=$this->input->post('titulo');
							$Descripcion=$this->input->post('descripcion');
							$Articulo=$this->input->post('articulo');
							$nombre_imagen = $_FILES['portada']['name'];
							if($this->administration_model->agregar($Titulo, $Descripcion, $Articulo)){
								$id = $insert_id = $this->db->insert_id();
								if($this->administration_model->agregarImagen($nombre_imagen,$id)){
									$serverUploadPath = $_SERVER['DOCUMENT_ROOT']."/fuerte.sf/imgUploads/portadas/";
									move_uploaded_file($_FILES['portada']['tmp_name'], $serverUploadPath.$nombre_imagen);
									$data['error'] = "La noticia ha sido publicada exitosamente!";
									$this->load->view('admin/components/head');
									$this->load->view('admin/noticias/noticia_agregada_exitosamente',$data);
									$this->load->view('admin/components/footer');
								}else{
									$data['error'] = "No se ha logrado agregar una imagen al servidor, la noticia no tendra imagen de portada.";
									$this->load->view('admin/components/head');
									$this->load->view('admin/noticias/exceptions/general_error',$data);
									$this->load->view('admin/components/footer');
								}	
							}else{
								$data['error'] = "No se ha logrado publicar la noticia, porfavor intente mas tarde!";
								$this->load->view('admin/components/head');
								$this->load->view('admin/noticias/exceptions/general_error',$data);
								$this->load->view('admin/components/footer');
							}	

			        	}
					}else{
						$data['error'] = "El tipo de imagen no es admitido! <br> Admitidos: .JPG, .JPGE, .PNG!";
						$this->load->view('admin/components/head');
						$this->load->view('admin/noticias/exceptions/img_type_error',$data);
						$this->load->view('admin/components/footer');
					}
				}else{
					$data['error'] = "No se ha seleccionado una imagen de portada!";
					$this->load->view('admin/components/head');
					$this->load->view('admin/noticias/exceptions/no_img_error',$data);
					$this->load->view('admin/components/footer');
				}
			}else{
				$data['error'] = "No se ha seleccionado una imagen de portada!";
				$this->load->view('admin/components/head');
				$this->load->view('admin/noticias/exceptions/no_submit_error',$data);
				$this->load->view('admin/components/footer');
			}
		}else{
			redirect("/Administration/login", "refresh");
		}
	}


	public function uploadImage(){
		$message['is_ok'] = false;
		if(isset($_FILES))
		{
			if(!$_FILES['file']['error'])
			{
				if(preg_match("/image/", $_FILES['file']['type']))
				{
					$name = md5(rand(100, 200));
					$ext = explode('.', $_FILES['file']['name']);
					$filename = $name . '.' . $ext[1];
					$destination = $_SERVER['DOCUMENT_ROOT']. '/fuerte.sf/imgUploads/' . $filename;
					$location = $_FILES["file"]["tmp_name"];
					move_uploaded_file($location, $destination);
					$message['url'] = '/fuerte.sf/imgUploads/' . $filename; 
					$message['is_ok'] = true;
				}
				else
				{
					$message['error'] = 'El tipo de archivo no es una imagen';
				}
			}
			else
			{
				$message['error'] = "La imagen no se ha subido correctamente error(".$_FILES['file']['error'].")";
			}	
		}
		else
		{
			$message['error'] = "No se ha enviado ningun archivo";
		}
		echo json_encode($message);
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
