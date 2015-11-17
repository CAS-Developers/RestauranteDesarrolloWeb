<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class usuarios_model extends CI_Model {
	
	public function listar(){

		$this->db->select("id, nombre, usuario, password");
		$this->db->order_by("nombre ASC");
		$this->db->from("usuarios");
		$retorno = $this->db->get();

		return $retorno->result_array();

	}

	public function cargar($id){

		$this->db->select("id, nombre, usuario, password");
		$this->db->from("usuarios");
		$this->db->where("id",$id);
		$retorno = $this->db->get();

		return $retorno->row();

	}

	public function guardar($nombre, $usuario, $password){

		$this->db->select("count(*) as cantidad");
		$this->db->from("usuarios");
		$this->db->where("usuario",$usuario);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->insert("usuarios",array(
				"nombre"=>$nombre,
				"usuario"=>$usuario,
				"password"=>md5($password)
				));

			return true;

		}

		return false;

	}

	public function actualizar($id,$nombre, $usuario, $password){

		$this->db->select("count(*) as cantidad");
		$this->db->from("usuarios");
		$this->db->where("usuario",$usuario);
		$this->db->where("id<>",$id);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->where("id",$id);
			$this->db->update("usuarios", array(
				"nombre"=>$nombre,
				"usuario"=>$usuario,
				"password"=>md5($password)
				));

			return true;

		}

		return false;

	}

	public function eliminar($id){

		$this->db->where("id",$id);
		$this->db->delete("usuarios");

	}

}