<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class advert extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('issue_model');
		$this->load->model('article_model');
		$this->load->model('advert_model');
		$this->load->model('client_model');
		$this->load->database();

		$this->headdata['styles']['jqueryuistructure'] = site_url('resources/css/jqueryuistructure.css');
		$this->headdata['styles']['jqueryuitheme'] = site_url('resources/css/jqueryuitheme.css');

		$this->headdata['scripts']['jqueryui'] = site_url('resources/js/jqueryui.js');

		$this->footdata['scripts']['adverts'] = site_url('resources/js/adverts.js');

		$this->load->view('admin/templates/head.php', $this->headdata);

	}

	public function index(){

		redirect('advert/view_adverts');

	}

	public function view_adverts(){

		$data['query'] = $this->advert_model->get_advert();

		$this->load->view('admin/adverts/view_adverts', $data);

		$this->load->view('admin/templates/footer.php', $this->footdata);

	}

	public function create_advert(){

		$data['temp_folder'] = "temp-".time()."-".$this->session->userdata('user_name');

        $data['issues'] = $this->issue_model->get_issue();

        $data['clients'] = $this->client_model->get_client();

        $data['articles'] = $this->article_model->get_article();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('location', 'Location', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/adverts/create_advert',$data);

            $this->load->view('admin/upload/upload_advert',$data);

            $this->load->view('admin/templates/wysiwyg');

            $this->load->view('admin/templates/footer.php', $this->footdata);

        } else {

        	if ($_POST['location'] == "site") {
        		$_POST['section'] = $_POST['section-site'];
        		$_POST['page'] = "n/a";
        		$_POST['type'] = $_POST['type-site'];
				$_POST['text'] = "n/a";

				$_POST['start_date'] = "2015-05-01";
				$_POST['end_date'] = "2015-05-01";

        	} elseif ($_POST['location'] == "magazine") {
        		$_POST['section'] = $_POST['section-mag'];
        		$_POST['type'] = $_POST['type-mag'];

				$dates[] = $this->issue_model->get_issue($_POST['section']);
				$dates[] = $this->issue_model->get_issue(($_POST['section']+1));				

				$_POST['start_date'] = $dates[0]['date'];
				$_POST['end_date'] = $dates[1]['date'];

				// $date['start'] = timestampdate($_POST['start_date']);
				// $date['end'] = timestampdate($_POST['end_date']);
				// dd($date);

        	};

            make_directory("adverts", $_POST['location']."/".$_POST['type'], url_title($_POST['client_name'], 'dash', TRUE));

            $source = "assets/uploads/".$_POST['temp_folder']."/";

            $destination = "assets/uploads/adverts/".url_title($_POST['client_name'], 'dash', TRUE)."/".$_POST['location']."/".$_POST['type']."/";

			move_files($source, $destination);

			$filename = get_files($destination);

			if (!empty($filename)) {
				$filename = $filename[0];				
			} else {
				$filename = "none uploaded";
			};

			//Need to pass file name with directory(absolute path?) to advert_model

    		$_POST['image'] = $filename;

            $this->advert_model->set_advert();

			$result = "Advert Created";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        }

	}

	public function edit_advert(){

		$data['temp_folder'] = "temp-".time()."-".$this->session->userdata('user_name');

        $data['issues'] = $this->issue_model->get_issue();

        $data['clients'] = $this->client_model->get_client();

        $data['articles'] = $this->article_model->get_article();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('location', 'Location', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/adverts/create_advert',$data);

            $this->load->view('admin/upload/upload_advert',$data);

            $this->load->view('admin/templates/wysiwyg');

            $this->load->view('admin/templates/footer.php', $this->footdata);

        } else {

        	if ($_POST['location'] == "site") {
        		$_POST['section'] = $_POST['section-site'];
        		$_POST['page'] = "n/a";
        		$_POST['type'] = $_POST['type-site'];
				$_POST['text'] = "n/a";

				$_POST['start_date'] = "2015-05-01";
				$_POST['end_date'] = "2015-05-01";

        	} elseif ($_POST['location'] == "magazine") {
        		$_POST['section'] = $_POST['section-mag'];
        		$_POST['type'] = $_POST['type-mag'];

				$dates[] = $this->issue_model->get_issue($_POST['section']);
				$dates[] = $this->issue_model->get_issue(($_POST['section']+1));				

				$_POST['start_date'] = $dates[0]['date'];
				$_POST['end_date'] = $dates[1]['date'];

				// $date['start'] = timestampdate($_POST['start_date']);
				// $date['end'] = timestampdate($_POST['end_date']);
				// dd($date);

        	};

            make_directory("adverts", $_POST['location']."/".$_POST['type'], url_title($_POST['client_name'], 'dash', TRUE));

            $source = "assets/uploads/".$_POST['temp_folder']."/";

            $destination = "assets/uploads/adverts/".url_title($_POST['client_name'], 'dash', TRUE)."/".$_POST['location']."/".$_POST['type']."/";

			move_files($source, $destination);

			$filename = get_files($destination);

			if (!empty($filename)) {
				$filename = $filename[0];				
			} else {
				$filename = "none uploaded";
			};

			//Need to pass file name with directory(absolute path?) to advert_model

    		$_POST['image'] = $filename;

            $this->advert_model->set_advert();

			$result = "Advert Created";

            $this->session->set_flashdata('info',$result);
						
			redirect('admin');

        }

	}

	public function delete_advert(){

		$id = $this->segment[0];

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

			$file = new SplFileInfo($_FILES['file']['name']);

			$fileName = "advert.".$file->getExtension();

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