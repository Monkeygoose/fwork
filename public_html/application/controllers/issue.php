<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class issue extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('issue_model');
		$this->load->database();
	}

	public function index() {
		redirect('issue/view_issues');
	}


    public function view_issues() {

            $data['query'] = $this->issue_model->get_issue();

            $this->load->view('admin/magazine/view_issues', $data);

    }

    public function create_issue() { 	

        $this->load->library('form_validation');

        $this->form_validation->set_rules('issue_num', 'Issue Number', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->load->view('admin/magazine/create_issue');

        } else {
            
            $this->issue_model->set_issue();
            
			$result = "Issue Created";
            $this->session->set_flashdata('info',$result);
			redirect('admin');  

        }

    }


    public function delete_issue($id = NULL) {

            $this->issue_model->delete_issue($id);

			redirect('admin');

    }	

}