<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function select_all_news(){
		$query = $this->db->query("SELECT fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia");
		return $query->result();
	}



}

?>