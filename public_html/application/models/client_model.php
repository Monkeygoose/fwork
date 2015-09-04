<?php
class client_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_client($id = FALSE) {

		if ($id === FALSE)
		{
			$this->db->select("*");
			$this->db->from("clients");
			$this->db->order_by("name", "asc");
			$query = $this->db->get();

			return $this->db->get('clients');
		}

		$query = $this->db->get_where('clients', array('id' => $id));
		$result = $query->row_array();
		return $result;

	}

	public function set_client() {

		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'),
			'contact_name' => $this->input->post('contact_name'),
			'contact_number' => $this->input->post('contact_number'),
			'contact_email' => $this->input->post('contact_email'),
			'contact_address' => $this->input->post('contact_address'),
			'contact_postcode' => $this->input->post('contact_postcode'),
			'long' => $this->input->post('long'),
			'lat' => $this->input->post('lat')
		);

		return $this->db->insert('clients', $data);

	}

	public function update_client($id = FALSE) {

	    $data = array(
			'name' => $this->input->post('name'),
			'contact_name' => $this->input->post('contact_name'),
			'contact_number' => $this->input->post('contact_number'),
			'contact_email' => $this->input->post('contact_email'),
			'contact_address' => $this->input->post('contact_address'),
			'contact_postcode' => $this->input->post('contact_postcode'),
			'long' => "0",
			'lat' => "0"
	    );

	    $this->db->where('id', $id);
	    $this->db->update('clients', $data);

	}

	public function delete_client($id = FALSE){

		$this->db->where('id', $id);
		$this->db->delete('client');

	}

}