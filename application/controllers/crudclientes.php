<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class Crudclientes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("clientes_model");
	}

	public function index(){

		$clientes = $this->clientes_model->listar();

		$this->load->view("templates/header", array(
				"title" => "Lista de Clientes"
			) );

		$this->load->view("clientes/listado", array(
				"clientes" => $clientes
			));

		$this->load->view("templates/footer");

	}

	public function crear()
    {
     	$this->load->view("templates/header", array(
				"title" => "Crear Cliente"
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

            $datos["cli"]= $this->clientes_model->cargar($id);

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
        $id=$this->input->post("id");



        if($id==false){
        $resultado=$this->clientes_model->guardar(
            $nombre,
            $direccion,
            $telefono
        );
        }else{
            $resultado=$this->clientes_model->actualizar(
                $id,
            $nombre,
            $direccion,
            $telefono
        );
        }

        //listado
        $this->load->view("templates/header", array(
				"title" => "Lista de Clientes"
			) );

        $clientes=$this->clientes_model->listar();

        $this->load->view('clientes/listado', array(
            "clientes"=>$clientes,
            "resultado"=>$resultado
        ));

       $this->load->view("templates/footer");

    }

		public function eliminar($id)
		{
				$this->clientes_model->eliminar($id);
				return redirect('crudclientes');
		}
}
