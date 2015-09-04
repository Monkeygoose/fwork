<?php if (! defined('BASEPATH')) exit('No direct script access');

class MY_Controller extends CI_Controller {

	function __construct() {
	    parent::__construct();
	    $this->_check_auth();

		$this->headdata = array(
			'title' => 'Articles',
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
				'spinner style sheet' => site_url('resources/css/spinner.css'),
				'dropzone css' => site_url('resources/css/dropzone.css')
				),
			'scripts' => array(
				'modernizr'=> site_url('resources/js/modernizr.custom.js'),
				'jquery' => site_url('resources/js/jquery.js'),
				'dropzone' => site_url('resources/js/dropzone.js')
				)
			);

		$this->footdata = array(
			'scripts' => array(
				'classie'=> site_url('resources/js/classie.js'),
				'Multi Level Menu' => site_url('resources/js/mlpushmenu.js'),
				'Main Script' => site_url('resources/js/main.js')
				)			
			);

	    $this->segments = $this->uri->segment_array();
        array_shift($this->segments);   // remove the first
        array_shift($this->segments);   // remove the second

	}

	private function _check_auth(){

	    if(!$this->session->userdata('logged_in')){
	        $this->session->sess_destroy();
			redirect('signin/login');
	    }
	    
	}
	
}