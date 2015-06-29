<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Register_model');
		$this->load->database();
	}

	public function index() {
		redirect('register/register_user');
	}

	public function register_user() {

		// Load support assets
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '<br />');

		// Set validation rules
		$this->form_validation->set_rules(
			'first_name',
			'First Name',
			'required|min_length[1]|max_length[125]'
		);

		$this->form_validation->set_rules(
			'last_name',
			'Last Name',
			'required|min_length[1]|max_length[125]'
		);

		$this->form_validation->set_rules(
			'email', 
			'Email',
			'required|min_length[1]|max_length[255]|valid_email'
		);

		$this->form_validation->set_rules(
			'password1',
			'Password', 
			'required|min_length[5]|max_length[15]'
		);

		$this->form_validation->set_rules(
			'password2',
			'Confirmation Password', 
			'required|min_length[5]|max_length[15]|matches[password1]'
		);

		// Begin validation
		if ($this->form_validation->run() == FALSE) {

			// First load, or problem with form
			$data['page_title'] = "Register";
			$this->load->view('admin/register/register',$data);

		} else {

			// check for duplicate emails.
			$this->load->model('Signin_model');
			
			$query = $this->Signin_model->does_user_exist($this->input->post('email'));

			if ($query->num_rows() > 0) {
				redirect('register/register_user');				
			};

			// Create hash from user password
			$options = array(
			    'cost' => 10,
			    'salt' => 'm26aG1982blACk10ocT20tweLVEAmB3r',
			);
			$hash = password_hash($this->input->post('password1'), PASSWORD_BCRYPT, $options);

			$data = array(
				'user_first_name' => $this->input->post('first_name'),
				'user_last_name' =>	$this->input->post('last_name'),
				'user_email' =>	$this->input->post('email'),
				'user_hash' => $hash
			);

			if ($this->Register_model->register_user($data)) {
				redirect('signin');
			} else {
				redirect('register');
			}

		}
	}

	public function view_users() {
		$data['query'] = $this->Register_model->get_all_users();
		$this->load->view('admin/register/view_all_users', $data);
	}

	public function delete_user(){
		// Load support assets
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters(
			'', 
			'<br />'
		);

		// Set validation rules
		$this->form_validation->set_rules(
			'id', 
			'User ID',
			'required|min_length[1]|max_length[11]|integer|is_natural'
		);

		if ($this->input->post()) {
			$id = $this->input->post('id');
		} else {
			$id = $this->uri->segment(3);
		}

		if ($this->form_validation->run() == FALSE) {
			// First load, or problem with form
			$data['query'] = $this->Register_model->get_user_details($id);
			$this->load->view('admin/register/delete_user', $data);
		} else {
			if ($this->Register_model->delete_user($id)) {
				redirect('admin');
			}
		}	    	

	}

}