<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news($slug = FALSE)
	{

		if ($slug === FALSE)
		{
			$query = $this->db->get("news");
			return $query->result_array();
		}

		$where["slug"]= $slug;
		$query = $this->db->get_where("news", $where);
		return $query->row_array();

	}

	public function set_news()
	{
		$this->load->helper("url");
		$this->load->library("session");

		$slug = url_title($this->input->post("title"), "dash", TRUE);

		$data = array(
				"title" => $this->input->post("title"),
				"slug" => $slug,
				"text" => $this->input->post("text")
			);

		$this->session->set_userdata("ultimanoticia",$data["title"]);

		return $this->db->insert("news", $data);

	}

}