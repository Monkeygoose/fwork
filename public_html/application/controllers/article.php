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

		$this->load->view('admin/templates/head.php', $this->headdata);

	}

	public function index() {
		redirect('article/view_articles');
	}

	public function view_articles(){
		
		$data['query'] = $this->article_model->get_article();

		$this->load->view('admin/magazine/view_articles', $data);

		$this->load->view('admin/templates/footer.php', $this->footdata);
	}

	public function create_article(){

		$data['temp_folder'] = "temp-".time()."-".$this->session->userdata('user_name');

        $data['query'] = $this->issue_model->get_issue();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

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

		$data['temp_folder'] = "issue-".$data['query']['issue']."/".$slug;

		$this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/edit_article',$data);

            $this->load->view('admin/upload/upload_form',$data);            

            $this->load->view('admin/templates/wysiwyg');

            $this->load->view('admin/templates/footer.php', $this->footdata);

        } else {

        	make_directory($_POST['issue'],$slug);

            $this->article_model->update_article($data['query']['id']);

			$result = "Edit Submitted";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        };	

	}

	public function view_posts(){
		
		$data['query'] = $this->article_model->get_article();

		$this->load->view('admin/magazine/view_posts', $data);

    	$this->load->view('admin/templates/footer.php', $this->footdata);
	  
	}

	public function create_post(){

		$data['temp_folder'] = "temp-".time()."-".$this->session->userdata('user_name');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/create_post',$data);

            $this->load->view('admin/upload/upload_form',$data);

            $this->load->view('admin/templates/wysiwyg');

            $this->load->view('admin/templates/footer.php', $this->footdata);

        } else {

            $slug = "blog-".url_title($_POST['title'], 'dash', TRUE);

            make_directory("blog",$slug);

            $source = "assets/uploads/".$_POST['temp_folder']."/";

            $destination = "assets/uploads/blog/".$slug."/";

			move_files($source, $destination);

			$_POST['text'] = update_image_links("/".$source, "/".$destination, $_POST['text']);

            $this->article_model->set_article();

			$result = "Blog Article Created";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        }		
	}

	public function edit_post($slug = NULL){

		$data['query'] = $this->article_model->get_article($slug);

		$data['temp_folder'] = "blog/".$slug;

		$this->load->library('form_validation');

        $this->form_validation->set_rules('issue', 'Issue Number', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/edit_post',$data);

            $this->load->view('admin/upload/upload_form',$data);            

            $this->load->view('admin/templates/wysiwyg');

            $this->load->view('admin/templates/footer.php', $this->footdata);

        } else {

        	//make_directory("blog" ,$slug);

            $this->article_model->update_article($data['query']['id']);

			$result = "Edit Submitted";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        };	

	}

	public function delete_article(){

			$getvars = array();

			$data = array();

	        foreach ($this->segments as $value) {
	        	$getvars[] = $value;
	        };

	        $data['id'] = $getvars['0'];

	        $data['issue'] = $getvars['1'];

	        $data['slug'] = $getvars['2'];

	        if ($data['issue'] == "0") {
	        	$data['issue'] = "blog";
	        } else {
	        	$data['issue'] = "issue-".$data['issue'];
	        };

            $source = "assets/uploads/".$data['issue']."/".$data['slug']."/";

            delete_files($source);

            $this->article_model->delete_article($data['id']);

            $result = "Article Deleted";

            $this->session->set_flashdata('info',$result);

			redirect('admin');

	}



}
