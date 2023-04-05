<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->loadImage();
		$this->load->view('home');
	}

	public function  loadImage()
	{

		$this->load->model('Image_model');
		$response  = $this->Image_model->getImage();

		$data['my_results'] = $response;
		$this->load->view('home', $data);

		// foreach ($response as $row) {
		// 	echo $row['caption'];
		// }


		// $display_data = array();

		// if ($response != false) {
		// 	foreach ($response->result() as $row) {
		// 		$image_data = array(
		// 			'id' => $row->property_id,
		// 			'caption' => $row->caption,
		// 			'tags' => $row->tag,
		// 			'image' => $row->image
		// 		);
		// 		array_push($image_data);
		// 	}
		// 	return$display_data;
		// }
	}
}
