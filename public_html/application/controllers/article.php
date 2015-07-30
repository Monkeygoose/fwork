<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class article extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('issue_model');
		$this->load->model('article_model');
		$this->load->database();
	}

	public function index() {
		redirect('article/view_articles');
	}

	public function view_articles(){
	  $data['query'] = $this->article_model->get_article();

	  $this->load->view('admin/magazine/view_articles', $data);
	}

	public function create_article(){

        $data['query'] = $this->issue_model->get_issue();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');



        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/create_article',$data);
            $this->load->view('admin/templates/wysiwyg');

        } else {

            $this->article_model->set_article();

			$result = "Article Created";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        }

	}

	public function delete_article($id = NULL){

            $this->article_model->delete_article($id);

            $result = "Article Deleted";

            $this->session->set_flashdata('info',$result);

			redirect('admin');

	}



}
