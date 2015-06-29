<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function register_user($data) {

		if ($this->db->insert('register', $data)) {
			return true;
		} else {
			return false;
		}

	}

	public function update_user($data, $email) {

		$this->db->where('user_email', $email);
		$this->db->update('register', $data);
		
	}

	public function get_all_users() {
		return $this->db->get('register');
	}

	public function get_user_details($id) {
		$this->db->where('user_id', $id);
		return $this->db->get('register');
	}

	public function delete_user($id) {

		$this->db->where('user_id', $id);

		if ($this->db->delete('register')) {
			return true;
		} else {
			return false;
		}

	}

}