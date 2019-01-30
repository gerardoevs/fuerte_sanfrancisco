<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function select_all_news(){
		$query = $this->db->query("SELECT fs_noticias.fechaPublicacion,fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND fs_estado=1 ORDER BY fs_noticias.id_noticia DESC");
		return $query->result();
	}

	public function get_current_page_records_news($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $this->db->select('*');
		$this->db->from('fs_noticias');
		$this->db->join('fs_imagenes', 'fs_noticias.id_noticia = fs_imagenes.id_noticia','inner');
		$this->db->order_by('fs_noticias.id_noticia', 'DESC'); 
        $query = $this->db->get();
 
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


	public function select_all_portadas(){
		$query = $this->db->query("SELECT fs_noticias.titulo_noticia,fs_noticias.id_noticia,fs_imagenes.nombre_imagen FROM fs_noticias INNER JOIN fs_imagenes INNER JOIN fs_portadas WHERE fs_noticias.id_noticia = fs_portadas.id_noticia AND fs_imagenes.id_noticia = fs_noticias.id_noticia ");
		return $query->result();
	}

	public function select_even_news(){
		$query = $this->db->query("SELECT fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND MOD(fs_noticias.id_noticia,2)=0 AND fs_estado=1 ORDER BY fs_noticias.id_noticia DESC LIMIT 7");
		return $query->result();
	}
	public function select_odd_news(){
		$query = $this->db->query("SELECT fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND MOD(fs_noticias.id_noticia,2)<>0 AND fs_estado=1 ORDER BY fs_noticias.id_noticia DESC LIMIT 7");
		return $query->result();
	}

	public function cargarNoticia($id){
		$query = $this->db->query("SELECT fs_noticias.fechaPublicacion,fs_noticias.id_noticia,fs_noticias.titulo_noticia, fs_noticias.descripcion_corta, fs_noticias.articulo, fs_imagenes.nombre_imagen FROM `fs_noticias` INNER JOIN fs_imagenes WHERE fs_noticias.id_noticia = fs_imagenes.id_noticia AND fs_noticias.id_noticia = $id AND fs_estado=1 ");
		return $query->result();
	}

	public function checkLive(){
		$query = $this->db->query("SELECT * from fs_live");
		$row = $query->row();
		if(isset($row)){
			if($row->liveUrl != null){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
		
	}

	public function select_directo(){
		$query = $this->db->query("SELECT * FROM fs_live");
		return $query->result();
	}



}

?>