<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class reader extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('issue_model');
		$this->load->model('article_model');
		$this->load->database();
	}

	public function view_article($slug = Null){

		$data['query'] = $this->article_model->get_article($slug);

		$this->load->view('magazine/article_header',$data);		

		$this->load->view('magazine/view_article',$data);

	}

}