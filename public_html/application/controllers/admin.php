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

		//$this->navdata = array();

	}

	public function index() {		
		$this->load->view('admin/templates/head.php', $this->headdata);

		$this->load->view('admin/home');

		$this->load->view('admin/templates/footer.php');

	}

	public function dashboard(){

		$this->load->view('admin/home');		

	}

	public function upload(){

        $this->load->library('form_validation');

		//may need to be absolute path (base_url())
		$folder = "assets/uploads/articles/".$_POST['directory']."/";

		if (!file_exists($folder)) {
		    mkdir($folder, 0777, true);
		};

		// NEEDS SCRUTINY

		$allowed = array('png', 'jpg', 'gif','zip');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"success"}';
				exit;
			}

			if(move_uploaded_file($_FILES['upl']['tmp_name'], $folder.$_FILES['upl']['name'])){
				echo '{"status":"success"}';
				exit;
			}
		}

		echo '{"status":"success"}';
		exit;

	}

}