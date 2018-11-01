<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration_model extends CI_Model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function agregar($nombre, $direccion, $tel,
							$fechaS, $fechaE,$horaS, $horaE,
							$observaciones,$nomproyecto,$cantidad,
							$descripcion,$total)
	{

		$datos = array(
			'nombre_cliente' => $nombre,
			'direccion' => $direccion,
			'telefono' => $tel,
			'fecha_salida' => $fechaS,
			'fecha_entrega' => $fechaE,
			'hora_salida' => $horaS,
			'hora_entrega' => $horaE,
			'observaciones' => $observaciones,
			'nombre_proyecto' => $nomproyecto,
			'cantidad' => $cantidad,
			'descripcion' => $descripcion,
			'total' => $total
			);
		 $this->db->insert('alquiler',$datos);
		 return true;
	}

	public function select_all_users(){
		return $this->db->query("SELECT * FROM fs_usuarios");
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