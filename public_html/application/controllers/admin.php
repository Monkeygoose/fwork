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
			'info' => $this->session->flashdata('info'),
			'gfonts' => array(
				'googlefonts' => 'http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,700,300'
				),
			'styles' => array(
				'reset' => site_url('resources/css/reset.css'),
				'menubar' => site_url('resources/css/menubar.css'),
				'admin style sheet' => site_url('resources/css/admin.css'),
				'spinner style sheet' => site_url('resources/css/spinner.css')
				),
			'scripts' => array(
				'modernizr'=> site_url('resources/js/modernizr.custom.js'),
				'jquery' => site_url('resources/js/jquery.js')
				)
			);

		$this->footdata = array(
			'scripts' => array(
				'classie'=> site_url('resources/js/classie.js'),
				'Multi Level Menu' => site_url('resources/js/mlpushmenu.js'),
				'Main Script' => site_url('resources/js/main.js')
				)			
			);

	}

	public function index() {		
		$this->load->view('admin/templates/head.php', $this->headdata);

		$this->load->view('admin/home');

		$this->load->view('admin/templates/footer.php', $this->footdata);

	}

	public function dashboard(){

		$this->load->view('admin/home');

	}

	public function upload($dir){

		if (!empty($_FILES)) {

			$tempFile = $_FILES['file']['tmp_name'];

			$fileName = $_FILES['file']['name'];

			$targetPath = 'assets/uploads/' . $dir . '/' ;

			if (!file_exists($targetPath)) {
			    mkdir($targetPath, 0777, true);
			};

			$targetFile = $targetPath . $fileName ;

			move_uploaded_file($tempFile, $targetFile);

			// if you want to save in db,where here			
			// with out model just for example

			// $this->load->database(); // load database

			// $this->db->insert('file_table',array('file_name' => $fileName));

		};

	}

}