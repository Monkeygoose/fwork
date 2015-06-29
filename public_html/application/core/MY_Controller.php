<?php if (! defined('BASEPATH')) exit('No direct script access');

class MY_Controller extends CI_Controller {

	function __construct() {
	    parent::__construct();
	    $this->_check_auth();
	}

	private function _check_auth(){

	    if(!$this->session->userdata('logged_in')){
	        $this->session->sess_destroy();
			redirect('signin/login');
	    }
	    
	}
	
}