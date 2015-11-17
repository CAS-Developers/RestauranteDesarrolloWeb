<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class recetas_model extends CI_Model {

  public function listar(){

    $this->db->select("id, nombre, indicaciones, id_cocinero");
    $this->db->order_by("nombre ASC");
    $this->db->from("recetas");
    $retorno = $this->db->get();

    return $retorno->result_array();

  }

  public function cargar($id){

		$this->db->select("id, nombre, indicaciones, id_cocinero");
		$this->db->from("recetas");
		$this->db->where("id",$id);
		$retorno = $this->db->get();

		return $retorno->row();

	}

  public function guardar($nombre, $indicaciones, $id_cocinero){

		$this->db->select("count(*) as cantidad");
		$this->db->from("recetas");
		$this->db->where("nombre",$nombre);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->insert("recetas",array(
				"nombre"=>$nombre,
				"indicaciones"=>$indicaciones,
        "id_cocinero"=>$id_cocinero
				));

			return true;

		}

		return false;

	}

	public function actualizar($id,$nombre, $indicaciones, $id_cocinero){

		$this->db->select("count(*) as cantidad");
		$this->db->from("recetas");
		$this->db->where("nombre",$nombre);
		$this->db->where("id<>",$id);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->where("id",$id);
			$this->db->update("recetas", array(
				"nombre"=>$nombre,
				"indicaciones"=>$indicaciones,
        "id_cocinero"=>$id_cocinero
				));

			return true;

		}

		return false;

	}

	public function eliminar($id){

		$this->db->where("id",$id);
		$this->db->delete("recetas");

	}
  
}
