<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("news_model");
	}

	public function index(){

		$this->load->helper('url');
		$this->load->library("session");

		$data["news"] = $this->news_model->get_news();
		$data["title"] = "Todas las Recetas";
		$data["ultimanoticia"] = $this->session->userdata("ultimanoticia");

		$this->load->view("templates/header",$data);
		$this->load->view("news/index",$data);
		$this->load->view("templates/footer",$data);

	}

	public function view($slug){

		$data["news_item"] = $this->news_model->get_news($slug);

		if (empty($data["news_item"]))
		{
			show_404();
		}

		$data["title"] = $data["news_item"]["title"];

		$this->load->view("templates/header",$data);
		$this->load->view("news/view",$data);
		$this->load->view("templates/footer",$data);


	}

	public function create(){

		$this->load->helper("form");
		$this->load->helper("url");
		$this->load->library("form_validation");

		$data["title"] = "Crear Nueva Noticia";

		$this->form_validation->set_rules("title", "Title", "required");
		$this->form_validation->set_rules("text", "Text", "required");

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("templates/header",$data);
			$this->load->view("news/create",$data);
			$this->load->view("templates/footer",$data);
		}
		else
		{
			$this->news_model->set_news();
			redirect("news/index");
		}

	}

}
