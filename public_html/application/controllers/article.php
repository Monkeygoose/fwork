<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class issue extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('article_model');
		$this->load->database();
	}

	public function index() {
		redirect('article/view_articles');
	}

  public function view_articles(){
      $data['query'] = $this->issue_model->get_issue();

      $this->load->view('admin/magazine/view_issues', $data);
  }



}
