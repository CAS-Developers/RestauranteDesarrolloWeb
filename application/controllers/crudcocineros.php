<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class Crudcocineros extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("cocineros_model");
	}

	public function index(){

		$cocineros = $this->cocineros_model->listar();

		$this->load->view("templates/header", array(
				"title" => "Lista de Cocineros"
			) );

		$this->load->view("cocineros/listado", array(
				"cocineros" => $cocineros
			));

		$this->load->view("templates/footer");

	}

	public function crear()
    {
     	$this->load->view("templates/header", array(
				"title" => "Agregar Cocinero"
			) );


     	$cocinero = new stdClass();

        $cocinero->nombre = "";
        $cocinero->empresa = "";
        $cocinero->pais = "";
        $cocinero->id = false;

        $datos = array(
            "coc"=> $cocinero
            );

        $this->load->view('cocineros/formulario',$datos);

        $this->load->view("templates/footer");
    }

    public function editar($id)
    {
        if ($id==0){
            show_404();
        }else{

            $datos["coc"]= $this->cocineros_model->cargar($id);

            $this->load->view("templates/header", array(
				"title" => "Editar Cocinero"
			) );

            $this->load->view('cocineros/formulario',$datos);

            $this->load->view("templates/footer");
        }
    }

    public function guardar()
    {
        $nombre=$this->input->post("nombre");
        $empresa=$this->input->post("empresa");
        $pais=$this->input->post("pais");
        $id=$this->input->post("id");



        if($id==false){
        $resultado=$this->cocineros_model->guardar(
            $nombre,
            $empresa,
            $pais
        );
        }else{
            $resultado=$this->cocineros_model->actualizar(
            $id,
            $nombre,
            $empresa,
            $pais
        );
        }

        redirect('crudcocineros');

    }

		public function eliminar($id)
		{
				$this->cocineros_model->eliminar($id);
				return redirect('crudcocineros');
		}
}
