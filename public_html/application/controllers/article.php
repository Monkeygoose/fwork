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

	}

	public function index() {
		redirect('article/view_articles');
	}

	public function view_articles(){
	  $data['query'] = $this->article_model->get_article();

	  $this->load->view('admin/magazine/view_articles', $data);
	}

	public function create_article(){

		$data['temp_folder'] = "temp-".time()."-".$this->session->userdata('user_name');

        $data['query'] = $this->issue_model->get_issue();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

		$this->load->view('admin/templates/head.php', $this->headdata);

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/create_article',$data);

            $this->load->view('admin/upload/upload_form',$data);

            $this->load->view('admin/templates/wysiwyg');

            $this->load->view('admin/templates/footer.php', $this->footdata);

        } else {

            $slug = url_title($_POST['title'], 'dash', TRUE);

            make_directory($_POST['issue'],$slug);

            $source = "assets/uploads/".$_POST['temp_folder']."/";

            $destination = "assets/uploads/issue-".$_POST['issue']."/".$slug."/";

			move_files($source, $destination);

			$_POST['text'] = update_image_links("/".$source, "/".$destination, $_POST['text']);

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
