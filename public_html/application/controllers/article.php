<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class article extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->helper('security');
		$this->load->model('issue_model');
		$this->load->model('article_model');
		$this->load->database();

		$this->headdata = array(
			'title' => 'Dashboard',
			'keywords' => '',
			'description' => '',
			'user_name' => $this->session->userdata('user_name'),
			'info' => $this->session->flashdata('info')
			);

	}

	public function index() {
		redirect('article/view_articles');
	}

	public function view_articles(){
	  $data['query'] = $this->article_model->get_article();

	  $this->load->view('admin/magazine/view_articles', $data);
	}

	public function create_article(){

		$this->load->view('admin/templates/head.php', $this->headdata);

        $data['query'] = $this->issue_model->get_issue();

        $data['temp_folder'] = "temp-".time()."-".$this->session->userdata('user_name');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');



        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/create_article',$data);

        	$this->load->view('admin/file/upload_form.php',$data);

            $this->load->view('admin/templates/wysiwyg');

        	$this->load->view('admin/file/scripts.php');

			$this->load->view('admin/templates/footer.php');

        } else {

            $this->article_model->set_article();

			$result = "Article Created";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        }

	}

	public function edit_article($slug = NULL){

        $data['issue'] = $this->issue_model->get_issue();

		$data['query'] = $this->article_model->get_article($slug);

		$this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/edit_article',$data);
            $this->load->view('admin/templates/wysiwyg');

        } else {

            $this->article_model->update_article($data['query']['id']);

			$result = "Edit Submitted";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        };	

	}

	public function view_posts(){
	  $data['query'] = $this->article_model->get_article();

	  $this->load->view('admin/magazine/view_posts', $data);
	  
	}

	public function create_post(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/create_post');
            $this->load->view('admin/templates/wysiwyg');

        } else {

            $this->article_model->set_article();

			$result = "Post Created";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        }		
	}

	public function edit_post($slug = NULL){

		$data['query'] = $this->article_model->get_article($slug);

		$this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/edit_post',$data);
            $this->load->view('admin/templates/wysiwyg');

        } else {

            $this->article_model->update_article($data['query']['id']);

			$result = "Edit Submitted";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        };	

	}

	public function delete_article($id = NULL){

            $this->article_model->delete_article($id);

            $result = "Article Deleted";

            $this->session->set_flashdata('info',$result);

			redirect('admin');

	}



}
