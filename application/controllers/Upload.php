<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

	public function index()
	{
		$this->load->view('upload');
	}


	public function do_upload()
	{
		$config['upload_path'] = './assets/img';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);


		if ($this->upload->do_upload('uploadedfile')) {

			$generated_id = $this->generate(3, 100, 600000); // Generate user id
			// $data = array('upload_data' => $this->upload->data());

			// $image = $data['upload_data']['file_name'];

			// $data['uploadedfile'] = $this->upload->data('file_name');
			// print_r($data);

			// echo "new new";
			// print_r($image);

			$file_data = $this->upload->data();
			$this->load->model('Image_model');
			$this->Image_model->save_upload($generated_id, $file_data);

			redirect('Home');

			// $result = $this->Upload_model->save_upload($generated_id);
			// echo json_decode($result);
		} else {
			echo $this->upload->display_errors();
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
