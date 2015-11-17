<?php if (!defined("BASEPATH")) exit("No puede acceder directamente a este archivo");

class Crudusuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("usuarios_model");
	}

	public function index(){

		$usuarios = $this->usuarios_model->listar();

		$this->load->view("templates/header", array(
				"title" => "Listado de Usuarios"
			) );

		$this->load->view("usuarios/listado", array(
				"usuarios" => $usuarios
			));

		$this->load->view("templates/footer");

	}

	public function crear()
    {
     	$this->load->view("templates/header", array(
				"title" => "Crear Usuario"
			) );


     	$usuario = new stdClass();

        $usuario->nombre = "";
        $usuario->usuario = "";
        $usuario->id = false;

        $datos = array(
            "usu"=> $usuario
            );

        $this->load->view('usuarios/formulario',$datos);

        $this->load->view("templates/footer");
    }

    public function editar($id)
    {
        if ($id==0){
            show_404();
        }else{

            $datos["usu"]= $this->usuarios_model->cargar($id);

            $this->load->view("templates/header", array(
				"title" => "Editar Usuario"
			) );

            $this->load->view('usuarios/formulario',$datos);

            $this->load->view("templates/footer");
        }
    }

    public function guardar()
    {
        $nombre=$this->input->post("nombre");
        $usuario=$this->input->post("usuario");
        $password=$this->input->post("password");
        $id=$this->input->post("id");



        if($id==false){
        $resultado=$this->usuarios_model->guardar(
            $nombre,
            $usuario,
            $password
        );
        }else{
            $resultado=$this->usuarios_model->actualizar(
                $id,
            $nombre,
            $usuario,
            $password
        );
        }

        //listado
        $this->load->view("templates/header", array(
				"title" => "Listado de Usuarios"
			) );

        $usuarios=$this->usuarios_model->listar();

        $this->load->view('usuarios/listado', array(
            "usuarios"=>$usuarios,
            "resultado"=>$resultado
        ));

       $this->load->view("templates/footer");

    }

		public function eliminar($id)
		{
				$this->usuarios_model->eliminar($id);
				return redirect('crudusuarios');
		}
}
