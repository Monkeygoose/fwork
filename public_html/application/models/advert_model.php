<?php
class advert_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_advert($id = FALSE) {

		if ($id === FALSE)
		{
			$this->db->select("*");
			$this->db->from("adverts");
			$this->db->order_by("start_date", "asc");
			$query = $this->db->get();

			return $this->db->get('adverts');
		}

		$query = $this->db->get_where('adverts', array('id' => $id));
		$result = $query->row_array();
		return $result;

	}

	public function set_advert() {

		$this->load->helper('url');

		$data = array(
			'location' => $this->input->post('location'),
			'section' => $this->input->post('section'),
			'page' => $this->input->post('page'),
			'type' => $this->input->post('type'),
			'client_name' => $this->input->post('client_name'),
			'click_count' => "0",
			'view_count' => "0",
			'link' => $this->input->post('link'),
			'image' => $this->input->post('image'),
			'text' => $this->input->post('text'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')
		);

		return $this->db->insert('adverts', $data);

	}

	public function update_advert($id = FALSE) {

	    $data = array(
			'location' => $this->input->post('location'),
			'section' => $this->input->post('section'),
			'page' => $this->input->post('page'),
			'type' => $this->input->post('type'),
			'client_name' => $this->input->post('client_name'),
			'click_count' => "0",
			'view_count' => "0",
			'link' => $this->input->post('link'),
			'image' => $this->input->post('image'),
			'text' => $this->input->post('text'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')
	    );

	    $this->db->where('id', $id);
	    $this->db->update('adverts', $data);

	}

	public function delete_advert($id = FALSE){

		$this->db->where('id', $id);
		$this->db->delete('adverts');

	}

	public function add_stat($id,$type){

		$query = $this->db->get_where('adverts', array('id' => $id));

		$result = $query->row_array();

		if (!$result) {
			return NULL;
		};

		$clicks = $result['click_count'];
		$impressions = $result['view_count'];

		if ($type = "click") {
			$clicks += 1;			
		} else {
			$impressions += 1;
		};

	    $data = array(
	    	'click_count' => $clicks,
	    	'view_count' => $impressions
	    );

	    $this->db->where('id', $id);
	    $this->db->update('adverts', $data);

	}

}