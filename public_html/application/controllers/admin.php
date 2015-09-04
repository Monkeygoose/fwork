<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class admin extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->database();

		if (!$this->session->flashdata('info')) { $this->session->set_flashdata('info',''); };

		$this->load->view('admin/templates/head.php', $this->headdata);

	}

	public function index() {

		$this->load->view('admin/home');

		$this->load->view('admin/templates/footer.php', $this->footdata);

	}

	public function upload(){

        $segments = $this->uri->segment_array();
        array_shift($segments);   // remove the first
        array_shift($segments);   // remove the second

        $dir = "";

        foreach ($segments as $value) {
        	$dir .= $value."/";
        };

		$dir = substr($dir, 0, -1);

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