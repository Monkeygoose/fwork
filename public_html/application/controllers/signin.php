<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	function __construct() {

	parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('security');

		$this->headdata = array(
			'title' => 'Login',
			'keywords' => '',
			'description' => '',
			'info' => $this->session->flashdata('info')
			);
	}

	public function index() {
		redirect('signin/login');
	}

	public function login() {

		if ($this->session->userdata('logged_in') == TRUE) {

			redirect('signin/loggedin');

		} else {

			$this->load->view('templates/head.php', $this->headdata);

			$this->load->library('form_validation');

			// Set validation rules for view filters
			$this->form_validation->set_rules(
				'email',
				'Email',
				'required|valid_email|min_length[5]|max_length[125]'
			);

			$this->form_validation->set_rules(
				'password',
				'Password ',
				'required|min_length[5]|max_length[30]'
			);

			if ($this->form_validation->run() == FALSE) {

				$this->load->view('signin/signin');

			} else {

				$email = $this->input->post('email');

				$password = $this->input->post('password');

				$this->load->model('Signin_model');

				$query = $this->Signin_model->does_user_exist($email);

				if ($query->num_rows() == 1) {

					// One matching row found
					foreach ($query->result() as $row) {

						// Generate hash from a their password
						$options = array(
						    'cost' => 10,
						    'salt' => 'm26aG1982blACk10ocT20tweLVEAmB3r',
						);
						$hash = password_hash($password, PASSWORD_BCRYPT, $options);

						// Compare the generated hash with that in the
						// database
						if ($hash != $row->user_hash) {
							// Didn't match so send back to login
							$data['login_fail'] = true;
							$this->load->view('signin/signin', $data);
						} else {
							$data = array(
							'user_id' => $row->user_id,
							'user_email' => $row->user_email,
							'user_name' => $row->user_first_name,
							'logged_in' => TRUE
							);
							// Save data to session
							$this->session->set_userdata($data);
							redirect('signin/loggedin');
						}

					}

				}

			}

		}
	}

	function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
		redirect('signin');
	}

	function loggedin() {

		if ($this->session->userdata('logged_in') == TRUE) {

			redirect('admin');

		} else {

			redirect('signin');

		}
	}
}
