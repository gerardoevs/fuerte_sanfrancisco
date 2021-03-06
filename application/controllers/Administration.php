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

	//NOTICIAS CON PAGINACION
	public function noticias(){
		
		$this->load->library('pagination');
        $limit_per_page = 5;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->administration_model->get_total_news();

		if($this->session->userdata('logged_in')){

			$data["noticias"] = $this->administration_model->get_current_page_records_news($limit_per_page, $start_index);

			$config['base_url'] = base_url('Administration/noticias');
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;

			$this->pagination->initialize($config);

			$data['links']=$this->pagination->create_links();
			
			$this->load->view('admin/components/head');
			$this->load->view('admin/components/nav');
			$this->load->view('admin/noticias/tabla_noticias', $data);
			$this->load->view('admin/components/footer');	
		}else{
			redirect("/Administration/login", "refresh");
		}
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
							$fechaHora = date("Y:m:d h:i:s");
							if($this->administration_model->agregar($Titulo, $Descripcion, $Articulo,$fechaHora)){
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

	public function publicarNoticiaEditada(){
		if($this->session->userdata('logged_in')){
			if(isset($_POST['submit'])){
				$id = $this->input->post('id');
				if ($this->administration_model->verifyImg($id)) {
					if($_FILES['portada']['name']==""){
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
							$fechaHora = date("Y:m:d h:i:s");
							if($this->administration_model->editar($Titulo, $Descripcion, $Articulo,$fechaHora,$id)){
								$data['error'] = "La noticia ha sido publicada exitosamente!";
								$this->load->view('admin/components/head');
								$this->load->view('admin/noticias/noticia_agregada_exitosamente',$data);
								$this->load->view('admin/components/footer');	
							}else{
								$data['error'] = "No se ha logrado publicar la noticia, porfavor intente mas tarde!";
								$this->load->view('admin/components/head');
								$this->load->view('admin/noticias/exceptions/general_error',$data);
								$this->load->view('admin/components/footer');
							}	
			        	}
					}else{
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
								$fechaHora = date("Y:m:d h:i:s");
								if($this->administration_model->editar($Titulo, $Descripcion, $Articulo,$fechaHora,$id)){
									if($this->administration_model->editarImagen($nombre_imagen,$id)){
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
					}
				}else{
					if($_FILES['portada']['name']!=""){

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
								$fechaHora = date("Y:m:d h:i:s");
								if($this->administration_model->editar($Titulo, $Descripcion, $Articulo,$fechaHora,$id)){
									if($this->administration_model->editarImagen($nombre_imagen,$id)){
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
			if($this->administration_model->verifyImg($id)){
				$data['noticia'] = $this->administration_model->select_new($id);
				$this->load->view('admin/components/head');
				$this->load->view('admin/components/nav');
				$this->load->view('admin/noticias/editar_noticia',$data);
				$this->load->view('admin/components/footer');
			}else{
				$data['noticia'] = $this->administration_model->select_new_no_img($id);
				$this->load->view('admin/components/head');
				$this->load->view('admin/components/nav');
				$this->load->view('admin/noticias/editar_noticia',$data);
				$this->load->view('admin/components/footer');
			}
				
		}else{
			redirect("/Administration/login", "refresh");
		}
	}

	public function habilitarNoticia(){
		if($this->session->userdata('logged_in')){
			$id = $this->uri->segment('3');
			$data['noticia'] = $this->administration_model->estadoNoticia($id);
			foreach ($data['noticia'] as $n) {
				if($n->fs_estado == 1){
					$this->administration_model->editarEstado(0,$id);
					redirect("/Administration/noticias", "refresh");
				}else{
					$this->administration_model->editarEstado(1,$id);
					redirect("/Administration/noticias", "refresh");
				}
			}
		}else{
			redirect("/Administration/login", "refresh");
		}
		
	}

	public function portadas(){

		$this->load->library('pagination');

        $limit_per_page = 5;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->administration_model->get_total_news();

		if($this->session->userdata('logged_in')){

			$data["noticias"] = $this->administration_model->get_current_page_records_portadas($limit_per_page, $start_index);

			$config['base_url'] = base_url('Administration/portadas');
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;

			$this->pagination->initialize($config);

			$data['links']=$this->pagination->create_links();

			$data['portadas'] = $this->administration_model->select_portadas();
			$this->load->view('admin/components/head');
			$this->load->view('admin/components/nav');
			$this->load->view('admin/portadas/portada_main_view',$data);
			$this->load->view('admin/components/footer');	
		}else{
			redirect("/Administration/login", "refresh");
		}
	}

	public function agregarPortada(){
		if($this->session->userdata('logged_in')){
			$id = $this->uri->segment('3');
			$cantidadPortadas = count($this->administration_model->verificarPortadas());
			if($cantidadPortadas >= 3){
				$data['error'] = "ya hay 3 noticas en portada, porfavor deselecciona una para agregar una nueva!";
				$this->load->view('admin/components/head');
				$this->load->view('admin/noticias/exceptions/general_error',$data);
				$this->load->view('admin/components/footer');
			}else{
				if($this->administration_model->agregarPortada($id)){
					redirect("/Administration/portadas", "refresh");
				}else{
					$data['error'] = "Ocurrio un problema al agregar la noticia de portada, por favor intenta mas tarde!";
					$this->load->view('admin/components/head');
					$this->load->view('admin/noticias/exceptions/general_error',$data);
					$this->load->view('admin/components/footer');
				}
			}
		}else{
			redirect("/Administration/login", "refresh");
		}
		
	}

	public function eliminarPortada(){
		if($this->session->userdata('logged_in')){
			$id = $this->uri->segment('3');
			if($this->administration_model->eliminarPortada($id)){
				redirect("/Administration/portadas", "refresh");
			}else{
				$data['error'] = "Ocurrio un problema al eliminar la noticia de portada, por favor intenta mas tarde!";
				$this->load->view('admin/components/head');
				$this->load->view('admin/noticias/exceptions/general_error',$data);
				$this->load->view('admin/components/footer');
			}			
		}else{
			redirect("/Administration/login", "refresh");
		}
	}

	public function directos(){
		if($this->session->userdata('logged_in')){
			$data['listaDirecto'] = $this->administration_model->select_directo();
			$this->load->view('admin/components/head');
			$this->load->view('admin/components/nav');
			$this->load->view('admin/directos/directos_main_view',$data);
			$this->load->view('admin/components/footer');	
		}else{
			redirect("/Administration/login", "refresh");
		}
	}

	public function nuevoDirecto(){
		if($this->session->userdata('logged_in')){
			$this->load->view('admin/components/head');
			$this->load->view('admin/components/nav');
			$this->load->view('admin/directos/directos_agregar');
			$this->load->view('admin/components/footer');	
		}else{
			redirect("/Administration/login", "refresh");
		}
	}

	public function publicarDirecto(){
		if($this->session->userdata('logged_in')){
			$this->form_validation->set_rules('titulo', 'Titulo de directo', 'required');
			$this->form_validation->set_rules('host', 'Descripcion de noticia', 'required');
			$this->form_validation->set_rules('embedlink', 'Link de directo', 'required');
        	if ($this->form_validation->run() == FALSE)
        	{
        		$this->load->view('admin/components/head');
				$this->load->view('admin/noticias/exceptions/form_validation_error');
				$this->load->view('admin/components/footer');
        	}else{
        		$directo = $this->administration_model->select_directo();
        		$titulo=$this->input->post('titulo');
				$host=$this->input->post('host');
				$embedlink=$this->input->post('embedlink');
        		if( count($directo) >0){
        			if($this->administration_model->actualizarDirecto($titulo, $host,$embedlink)){
        				$this->load->view('admin/components/head');
						$this->load->view('admin/components/nav');
						$this->load->view('admin/directos/directo_agregado_exitosamente');
						$this->load->view('admin/components/footer');
        			}else{
        				$this->load->view('admin/components/head');
						$this->load->view('admin/components/nav');
						$this->load->view('admin/directos/general_error');
						$this->load->view('admin/components/footer');
        			}
        		}else{
        			if($this->administration_model->agregarDirecto($titulo, $host,$embedlink)){
        				$this->load->view('admin/components/head');
						$this->load->view('admin/components/nav');
						$this->load->view('admin/directos/directo_agregado_exitosamente');
						$this->load->view('admin/components/footer');
        			}else{
        				$this->load->view('admin/components/head');
						$this->load->view('admin/components/nav');
						$this->load->view('admin/directos/general_error');
						$this->load->view('admin/components/footer');
        			}
        		}
        	}	
		}else{
			redirect("/Administration/login", "refresh");
		}
	}

	public function cancelarDirecto(){
		if($this->session->userdata('logged_in')){
			if($this->administration_model->actualizarDirecto(null,null,null)){
				redirect("/Administration/directos", "refresh");
			}else{
				$this->load->view('admin/components/head');
				$this->load->view('admin/components/nav');
				$this->load->view('admin/directos/general_error');
				$this->load->view('admin/components/footer');
			}	
		}else{
			redirect("/Administration/login", "refresh");
		}
	}


}
