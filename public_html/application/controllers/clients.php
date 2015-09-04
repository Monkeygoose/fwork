<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class client extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('advert_model');
		$this->load->model('client_model');
		$this->load->database();

		$this->load->view('admin/templates/head.php', $this->headdata);

	}

	public function index(){

		redirect('client/view_clients');

	}

};