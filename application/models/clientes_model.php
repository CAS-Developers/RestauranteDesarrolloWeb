<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class clientes_model extends CI_Model {

  public function listar(){

    $this->db->select("id, nombre, direccion, telefono, id_receta");
    $this->db->order_by("nombre ASC");
    $this->db->from("clientes");
    $retorno = $this->db->get();

    return $retorno->result_array();

  }

  public function cargar($id){

		$this->db->select("id, nombre, direccion, telefono, id_receta");
		$this->db->from("clientes");
		$this->db->where("id",$id);
		$retorno = $this->db->get();

		return $retorno->row();

	}

  public function guardar($nombre, $direccion, $telefono, $id_receta){

		$this->db->select("count(*) as cantidad");
		$this->db->from("clientes");
		$this->db->where("nombre",$nombre);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->insert("clientes",array(
				"nombre"=>$nombre,
				"direccion"=>$direccion,
        "telefono"=>$telefono,
        "id_receta"=>$id_receta
				));

			return true;

		}

		return false;

	}

	public function actualizar($id, $nombre, $direccion, $telefono, $id_receta){

		$this->db->select("count(*) as cantidad");
		$this->db->from("clientes");
		$this->db->where("nombre",$nombre);
		$this->db->where("id<>",$id);
		$retorno = $this->db->get();
		$arraydevuelto = $retorno->result_array();

		$cantidad = $arraydevuelto[0]["cantidad"];

		if($cantidad == 0){

			$this->db->where("id",$id);
			$this->db->update("clientes", array(
				"nombre"=>$nombre,
				"direccion"=>$direccion,
        "telefono"=>$telefono,
        "id_receta"=>$id_receta
				));

			return true;

		}

		return false;

	}

	public function eliminar($id){

		$this->db->where("id",$id);
		$this->db->delete("clientes");
	}

}
