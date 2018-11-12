<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function select_all_news(){
		$query = $this->db->query("SELECT fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND fs_estado=1");
		return $query->result();
	}

	public function select_all_portadas(){
		$query = $this->db->query("SELECT fs_noticias.titulo_noticia,fs_noticias.id_noticia,fs_imagenes.nombre_imagen FROM fs_noticias INNER JOIN fs_imagenes INNER JOIN fs_portadas WHERE fs_noticias.id_noticia = fs_portadas.id_noticia AND fs_imagenes.id_noticia = fs_noticias.id_noticia");
		return $query->result();
	}

	public function select_even_news(){
		$query = $this->db->query("SELECT fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND MOD(fs_noticias.id_noticia,2)=0 AND fs_estado=1 LIMIT 7");
		return $query->result();
	}
	public function select_odd_news(){
		$query = $this->db->query("SELECT fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND MOD(fs_noticias.id_noticia,2)<>0 AND fs_estado=1 LIMIT 7");
		return $query->result();
	}

	public function cargarNoticia($id){
		$query = $this->db->query("SELECT fs_noticias.fechaPublicacion,fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND fs_noticias.id_noticia = $id AND fs_estado=1");
		return $query->result();
	}



}

?>