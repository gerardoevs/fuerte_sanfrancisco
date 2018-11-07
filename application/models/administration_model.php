<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function agregar($titulo, $descripcion, $articulo)
	{
		$datos = array(
			'titulo_noticia' => $titulo,
			'descripcion_corta' => $descripcion,
			'articulo' => $articulo,
			//'fechaPublicacion' => $fechaPublicacion,
			'fs_estado' => 1
			);
		 $this->db->insert('fs_noticias',$datos);
		 return true;
	}

	public function agregarImagen($nombre,$id)
	{
		$datos = array(
			'nombre_imagen' => $nombre,
			'id_noticia' => $id
			);
		 $this->db->insert('fs_imagenes',$datos);
		 return true;
	}

	public function select_all_users(){
		
		return $query = $this->db->query("SELECT * FROM fs_usuarios");
	}

	public function select_all_news(){
		$query = $this->db->query("SELECT * FROM fs_noticias");
		return $query->result();
	}

	public function actualizarAlquilarEquipo($numalquiler,$numequipo)
	{
		$query = $this->db->query("UPDATE inventario SET estado='A', num_alquiler=$numalquiler WHERE numero_equipo=$numequipo");
	}

}

?>