<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function agregar($titulo, $descripcion, $articulo,$fechaPublicacion)
	{
		$datos = array(
			'titulo_noticia' => $titulo,
			'descripcion_corta' => $descripcion,
			'articulo' => $articulo,
			'fechaPublicacion' => $fechaPublicacion,
			'fs_estado' => 1
			);
		 $this->db->insert('fs_noticias',$datos);
		 return true;
	}

	public function editar($titulo, $descripcion, $articulo,$fechaPublicacion,$id)
	{
		$datos = array(
			'titulo_noticia' => $titulo,
			'descripcion_corta' => $descripcion,
			'articulo' => $articulo,
			'fechaPublicacion' => $fechaPublicacion,
			'fs_estado' => 1
			);
		 $this->db->where('id_noticia', $id); 
		 $this->db->update('fs_noticias',$datos);
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

	public function editarImagen($nombre,$id)
	{
		$datos = array(
			'nombre_imagen' => $nombre,
			'id_noticia' => $id
			);
		$this->db->where('id_imagenes',$id);
		$this->db->update('fs_imagenes',$datos); 
		return true;
	}

	public function select_all_users(){
		
		return $query = $this->db->query("SELECT * FROM fs_usuarios");
	}

	public function select_all_news(){
		$query = $this->db->query("SELECT * FROM fs_noticias");
		return $query->result();
	}

	public function get_current_page_records_news($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("fs_noticias");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total_news() 
    {
        return $this->db->count_all("fs_noticias");
    }

	public function verifyImg($id){
		$query = $this->db->query("SELECT * FROM fs_imagenes WHERE id_noticia=$id");
		if(count($query->result()) > 0){
			return true;
		}else{
			return false;
		}
	}

	public function select_new($id){
		$query = $this->db->query("SELECT fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND fs_noticias.id_noticia=$id");
		return $query->result();
	}

	public function select_new_no_img($id){
		$query = $this->db->query("SELECT * FROM fs_noticias WHERE id_noticia=$id");
		return $query->result();
	}

	public function estadoNoticia($id){
		$query = $this->db->query("SELECT * FROM fs_noticias WHERE id_noticia=$id");
		return $query->result();
	}

	public function editarEstado($estado,$id){
		$query = $this->db->query("UPDATE fs_noticias SET fs_estado=$estado WHERE id_noticia=$id");	
		 return true;
	}

	public function verificarPortadas(){
		$query = $this->db->query("SELECT * FROM fs_portadas");
		return $query->result();
	}

	public function select_portadas(){
		$query = $this->db->query("SELECT * FROM fs_noticias INNER JOIN fs_portadas WHERE fs_portadas.id_noticia = fs_noticias.id_noticia");
		return $query->result();
	}

	public function get_current_page_records_portadas($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("fs_noticias");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }	

	public function agregarPortada($id){
		$datos = array(
			'id_noticia' => $id
			);
		 $this->db->insert('fs_portadas',$datos);
		 return true;	
	}

	public function eliminarPortada($id){
		$query = $this->db->query("DELETE FROM fs_portadas WHERE id_noticia=$id");
		if($query){
			return true;	
		}else{
			return false;	
		}
	}

	public function select_directo(){
		$query = $this->db->query("SELECT * FROM fs_live");
		return $query->result();
	}


	public function agregarDirecto($titulo,$host,$link)
	{
		$datos = array(
			'titulo' => $titulo,
			'host' => $host,
			'liveUrl' => $link
			);
		 $this->db->insert('fs_live',$datos);
		 return true;
	}

	public function actualizarDirecto($titulo,$host,$link)
	{
		$datos = array(
			'titulo' => $titulo,
			'host' => $host,
			'liveUrl' => $link
			);
		$this->db->where('id',1);
		$this->db->update('fs_live',$datos); 
		 return true;
	}


	

}

?>