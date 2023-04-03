<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

	public function index()
	{
		$this->load->view('register');
	}

	public function registerUser()
	{
		// Form Validation
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Lasr Name', 'required');
		$this->form_validation->set_rules('uname', 'User Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_table.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('confpassword', 'Confirm Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {
			$this->load->model('User_model');

			$generated_id = $this->generate(3, 100, 600000); // Generate user id
			$response = $this->User_model->insertUserData($generated_id);
			
			// successfull saved redirect to the login page
			if ($response) {
				$this->session->set_flashdata('sucecess', 'Successfully registed!.. Please use your email and password to login.');
				redirect('Login');
			} else{
				$this->session->set_flashdata('unsucecess', 'Something went wrong!');
				redirect('Register');
			}
		}
	}

	function generate($prefix_length, $min, $max)
	{
		$chars      = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand_chars = substr(str_shuffle($chars), 0, $prefix_length);
		$generated_id = $rand_chars . '-' . rand($min, $max);
		return $generated_id;
	}
}
