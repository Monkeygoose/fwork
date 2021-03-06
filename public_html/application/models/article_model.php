<?php
class Article_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_article($slug = FALSE) {

		if ($slug === FALSE)
		{
			$this->db->select("*");
			$this->db->from("articles");
			$this->db->order_by("issue", "asc");
			$query = $this->db->get();

			return $this->db->get('articles');
		}

		$query = $this->db->get_where('articles', array('slug' => $slug));
		$result = $query->row_array();
		return $result;

	}

	public function get_issue($issue) {

		$query = $this->db->get_where('articles', array('issue' => $issue));
		$result = $query->result_array();

		$numofarticles = count($result);

		$final = array(
			"art" => array(),
			"music" => array(),
			"poetry" => array(),
			"design" => array()
			);

		foreach ($result as $value) {
			$final[$value['cat']][] = $value;
		}

		$final['numofarticles'] = $numofarticles;

		return $final;

	}

	public function set_article() {

		$this->load->helper('url');

		if ($this->input->post('issue') == "0") {
			$slug = "blog-".url_title($this->input->post('title'), 'dash', TRUE);
		} else {
			$slug = url_title($this->input->post('title'), 'dash', TRUE);
		};

		$data = array(
			'title' => $this->input->post('title'),
			'author' => $this->input->post('author'),
			'date' => date('Y-m-d'),
			'slug' => $slug,
			'issue' => $this->input->post('issue'),
			'cat' => $this->input->post('cat'),
			'text' => $this->input->post('text'),
			'views' => "0"
		);

		return $this->db->insert('articles', $data);

	}

	public function update_article($id) {

	    $data = array(
	        'title' => $this->input->post('title'),
			'author' => $this->input->post('author'),
			'date' => date('Y-m-d'),
			'issue' => $this->input->post('issue'),
			'cat' => $this->input->post('cat'),
	        'text' => $this->input->post('text')
	    );

	    $this->db->where('id', $id);
	    $this->db->update('articles', $data);

	}

	public function delete_article($id = FALSE){

		$this->db->where('id', $id);
		$this->db->delete('articles');

	}

	public function add_views($slug){

		$query = $this->db->get_where('articles', array('slug' => $slug));

		$result = $query->row_array();

		if (!$result) {
			return NULL;
		};

		$num = $result['views'];
		$id = $result['id'];

		$num += 1;

	    $data = array(
	    	'views' => $num
	    );

	    $this->db->where('id', $id);
	    $this->db->update('articles', $data);

	}

}