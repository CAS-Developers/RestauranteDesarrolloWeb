<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class Crudclientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("clientes_model");
		$this->load->model("recetas_model");
	}

	public function recorrer($arreglo, $valores) {
      $i = 0;
      foreach ($arreglo as $key => $value) {
        $resultado[(int)$value["id"]] = $value[$valores];
      }
      return $resultado;
    }

	public function index(){

		$clientes = $this->clientes_model->listar();
		$recetas = $this->recorrer($this->recetas_model->listar(),"nombre");

		$this->load->view("templates/header", array(
				"title" => "Lista de Clientes"
			) );

		$this->load->view("clientes/listado", array(
				"clientes" => $clientes, "recetas" => $recetas
			));

		$this->load->view("templates/footer");

	}

	public function crear()
    {
			$recetas = $this->recorrer($this->recetas_model->listar(),"nombre");

     	$this->load->view("templates/header", array(
				"title" => "Crear Cliente", "recetas"=> $recetas
			) );


     	$cliente = new stdClass();

        $cliente->nombre = "";
        $cliente->direccion = "";
        $cliente->telefono = "";
        $cliente->id = false;

        $datos = array(
            "cli"=> $cliente
            );

        $this->load->view('clientes/formulario',$datos);

        $this->load->view("templates/footer");
    }

    public function editar($id)
    {
        if ($id==0){
            show_404();
        }else{
						$recetas = $this->recorrer($this->recetas_model->listar(),"nombre");
            $datos["cli"]= $this->clientes_model->cargar($id);
						$datos["recetas"]=$recetas;

            $this->load->view("templates/header", array(
				"title" => "Editar Cliente"
			) );

            $this->load->view('clientes/formulario',$datos);

            $this->load->view("templates/footer");
        }
    }

    public function guardar()
    {
        $nombre=$this->input->post("nombre");
        $direccion=$this->input->post("direccion");
        $telefono=$this->input->post("telefono");
				$receta=$this->input->post("id_receta");
        $id=$this->input->post("id");



        if($id==false){
        $resultado=$this->clientes_model->guardar(
            $nombre,$direccion,$telefono,$receta
        );
        }else{
            $resultado=$this->clientes_model->actualizar(
                $id,$nombre,$direccion,$telefono,$receta
        );
        }
				redirect('crudclientes');
    }

		public function eliminar($id)
		{
				$this->clientes_model->eliminar($id);
				return redirect('crudclientes');
		}
}
