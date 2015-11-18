<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class Crudrecetas extends CI_Controller{

  public function __construct()
	{
		parent::__construct();
		$this->load->model("recetas_model");
    $this->load->model("cocineros_model");
	}

  public function recorrer($arreglo, $valores) {
      $i = 0;
      foreach ($arreglo as $key => $value) {
        $resultado[(int)$value["id"]] = $value[$valores];
      }
      return $resultado;
    }

  public function index(){

		$recetas = $this->recetas_model->listar();
    $cocineros = $this->recorrer($this->cocineros_model->listar(), "nombre");

		$this->load->view("templates/header", array(
				"title" => "Todas las Recetas"
			) );

		$this->load->view("recetas/listado", array(
				"recetas" => $recetas, "cocineros" => $cocineros
			));

		$this->load->view("templates/footer");

	}

  public function crear()
    {
      $cocineros = $this->recorrer($this->cocineros_model->listar(), "nombre");

     	$this->load->view("templates/header", array(
				"title" => "Crear receta", "cocineros" => $cocineros
			) );


     	$receta = new stdClass();

        $receta->nombre = "";
        $receta->indicaciones = "";
        $receta->id = false;

        $datos = array(
            "rec"=> $receta
            );

        $this->load->view('recetas/formulario',$datos);

        $this->load->view("templates/footer");

    }

    public function editar($id)
    {
        if ($id==0){
            show_404();
        }else{
            $cocineros = $this->recorrer($this->cocineros_model->listar(),"nombre");
            $datos["rec"]= $this->recetas_model->cargar($id);
            $datos["cocineros"]= $cocineros;

            $this->load->view("templates/header", array(
				"title" => "Editar Receta"
			) );

            $this->load->view('recetas/formulario',$datos);

            $this->load->view("templates/footer");
        }
    }

    public function guardar()
    {
        $nombre=$this->input->post("nombre");
        $indicaciones=$this->input->post("indicaciones");
        $cocinero=$this->input->post("id_cocinero");
        $id=$this->input->post("id");


        if($id==false){
        $resultado=$this->recetas_model->guardar(
            $nombre, $indicaciones, $cocinero
        );
        }else{
            $resultado=$this->recetas_model->actualizar(
                $id, $nombre, $indicaciones, $cocinero
        );
        }

        redirect('crudrecetas');

    }

		public function eliminar($id)
		{
				$this->recetas_model->eliminar($id);
				return redirect('crudrecetas');
		}
}
