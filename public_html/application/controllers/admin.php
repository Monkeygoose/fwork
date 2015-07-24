<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->database();

		if (!$this->session->flashdata('info')) { $this->session->set_flashdata('info',''); };

		$this->headdata = array(
			'title' => 'Dashboard',
			'keywords' => '',
			'description' => '',
			'user_name' => $this->session->userdata('user_name'),
			'info' => $this->session->flashdata('info')
			);

		$this->navdata = array();

	}

	public function index() {		
		$this->load->view('admin/templates/head.php', $this->headdata);

		$this->load->view('admin/templates/footer.php');

        $this->load->view('admin/templates/wysiwyg');

	}

	public function dashboard(){

		$this->load->view('admin/home');

	}

}