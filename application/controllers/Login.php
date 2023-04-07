<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	function loginUser(){
		// Form Validation
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
		
			$this->load->model('User_model');
			$response = $this->User_model->checkUserData();

			if ($response != false) {
				
				$user_data = array(
					'id' => $response->property_id,
					'fname' => $response->first_name,
					'lname' => $response->last_name,
					'uname' => $response->user_name,
					'email' => $response->email,
					'password' => $response->password,
					'logged_in' => TRUE,
					'search_keyword' => "search"
				);

				$this->session->set_userdata($user_data);
				redirect('home');

			} else {
				$this->session->set_flashdata('error', 'Wrong email and password!');
				redirect('login');
			}

		}
	}


	function logoutUser(){
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('fname');
			$this->session->unset_userdata('lname');
			$this->session->unset_userdata('uname');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('password');
			$this->session->unset_userdata('logged_in');

			redirect('login');
	}
}