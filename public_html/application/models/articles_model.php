<?php
class Article_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_article($slug = FALSE) {

		if ($slug === FALSE)
		{
			$this->db->select("*");
			$this->db->from("articles");
			$this->db->order_by("issue", "asc");
			$query = $this->db->get();

			return $query->result_array();
		}

		$query = $this->db->get_where('articles', array('slug' => $slug));
		return $query->row_array();

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

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'author' => $this->input->post('author'),
			'date' => $this->input->post('date'),
			'slug' => $slug,
			'issue' => $this->input->post('issue'),
			'cat' => $this->input->post('cat'),
			'text' => $this->input->post('text'),
			'views' => "0"
		);

		return $this->db->insert('articles', $data);

	}

	public function update_article($id, $title, $author, $date, $issue, $cat, $text) {

	    $data = array(
	        'title' => $title,
			'author' => $author,
			'date' => $date,
			'issue' => $issue,
			'cat' => $cat,
	        'text' => $text
	    );

	    $this->db->where('id', $id);
	    $this->db->update('articles', $data);

	}

	public function delete_article($slug = FALSE){

		$this->db->where('slug', $slug);
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