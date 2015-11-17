<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class cocineros_model extends CI_Model {

  public function listar(){

    $this->db->select("id, nombre, empresa, pais");
    $this->db->order_by("nombre ASC");
    $this->db->from("cocineros");
    $retorno = $this->db->get();

    return $retorno->result_array();

  }

  public function cargar($id){

		$this->db->select("id, nombre, empresa, pais");
		$this->db->from("cocineros");
		$this->db->where("id",$id);
		$retorno = $this->db->get();

		return $retorno->row();

	}

  public function guardar($nombre, $empresa, $pais){

		$this->db->select("count(*) as cantidad");
		$this->db->from("cocineros");
		$this->db->where("nombre",$nombre);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->insert("cocineros",array(
				"nombre"=>$nombre,
				"empresa"=>$empresa,
        "pais"=>$pais
				));

			return true;

		}

		return false;

	}

	public function actualizar($id,$nombre, $empresa, $pais){

		$this->db->select("count(*) as cantidad");
		$this->db->from("cocineros");
		$this->db->where("nombre",$nombre);
		$this->db->where("id<>",$id);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->where("id",$id);
			$this->db->update("cocineros", array(
				"nombre"=>$nombre,
				"empresa"=>$empresa,
        "pais"=>$pais
				));

			return true;

		}

		return false;

	}

	public function eliminar($id){

		$this->db->where("id",$id);
		$this->db->delete("cocineros");

	}

}
