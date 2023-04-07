<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->loadImage($page = "");
		// $this->load->view('home');
	}

	public function loadImage($page = "")
	{
		$this->load->model('Image_model');

		$total_row = $this->Image_model->getTotalImageCount();
		$baseUrl = base_url('index.php/Home/loadImage');
		$typeOfGet = "All";

		$response_from_model = $this->getPaginate($page, $total_row, $baseUrl, $typeOfGet);

		// ==========================================

		// hear code have belowww 


		$response = $this->getImg($response_from_model);
		// print_r($total_row);
		// 			die();

		// Pass the thumbnail filenames to the view
		$data['thumbnails'] = $response;
		$this->load->view('home', $data);

		// ================================================================

		// =====================================

		// $data['my_results'] = $image_array;
		// $this->load->view('home', $data);



		// foreach ($response as $row) {
		// 	
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

	public function getPaginate($page, $total_row, $baseUrl, $typeOfGet)
	{
		$this->load->model('Image_model');



		// $total_row = $modelMethod;
		$per_page = 12;
		$curr_page = 0;

		if (isset($page) && trim($page) != "") {
			$curr_page = $page;
		}

		

		$this->load->library('pagination');
		$config['base_url'] = $baseUrl;
		$config['total_rows'] = $total_row;
		$config['per_page'] = $per_page;
		$config['uri_segment'] = 3;

		// $config['enable_query_strings'] = true;
		// $config['use_page_numbers'] = true;
		// $config['page_query_string'] = true;
		$config['reuse_query_string'] = true;

		$config['full_tag_open'] = "<ul class='pagination pagination-ls justify-content-center'>";
		$config['full_tag_close'] = "</ul>";

		$config['num_tag_open'] = "<li class='page-item'>";
		$config['num_tag_close'] = "<li>";

		$config['cur_tag_open'] = "<li class='page-item disabled'><a class='page-link' href=''>";
		$config['cur_tag_close'] = "</a></li>";

		$config['next_tag_open'] = "<li class='page-item'>";
		$config['next_tag_close'] = "</li>";

		$config['prev_tag_open'] = "<li class='page-item'>";
		$config['prev_tag_close'] = "</li>";

		$config['first_tag_open'] = "<li class='page-item'>";
		$config['first_tag_close'] = "</li>";

		$config['last_tag_open'] = "<li class='page-item'>";
		$config['last_tag_close'] = "</li>";

		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();



		if ($typeOfGet == "All") {
			$response_from_model  = $this->Image_model->getImage($per_page, $curr_page);
		} else {

			$response_from_model  = $this->Image_model->searchImage($per_page, $curr_page);
		}
		$this->load->vars('pagination', $pagination);


		return $response_from_model;
	}


	public function getImg($response)
	{
		// Load the GD library
		if (!extension_loaded('gd')) {
			die('GD library not found.');
		}



		// Set the path to the thumbnail images directory
		$thumbnails_dir = './assets/thumbnails';
		$thumbnail_array = array();

		foreach ($response as $response_image) {

			// print_r($response_image['image']);
			// die();
			// 
			// Create a GD image resource from the image data
			$image = imagecreatefromstring($response_image['image']);


			// Calculate the dimensions of the thumbnail image
			$thumbnail_width = 200;
			$thumbnail_height = 200;
			$original_width = imagesx($image);
			$original_height = imagesy($image);
			$scale = max($thumbnail_width / $original_width, $thumbnail_height / $original_height);
			$new_width = round($original_width * $scale);
			$new_height = round($original_height * $scale);

			// Create a new GD image resource for the thumbnail image
			$thumbnail = imagecreatetruecolor($new_width, $new_height);

			// Copy and resize the original image to the thumbnail image
			imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

			// Save the thumbnail to the output file
			$thumbnail_filenames = $thumbnails_dir . $response_image['property_id'] . '.jpg';
			imagejpeg($thumbnail, $thumbnail_filenames);


			// Assuming $thumbnail is a GdImage object
			ob_start();
			imagepng($thumbnail);
			$thumbnailData = ob_get_contents();
			ob_end_clean();

			// Remove the "data:image/png;base64," prefix from the data URL
			$thumbnailData = ltrim($thumbnailData, 'data:image/png;base64,');



			// Create an array of the thumbnail filenames
			// $thumbnail_array[] = $thumbnailData;
			$thumbnail_array[] = array(
				'image' => $thumbnailData,
				'id' => $response_image['property_id']
			);
		}

		// print_r($thumbnail_array);
		// die();
		return $thumbnail_array;
	}



	public function searchByCaptionOrID($page = "")
	{

		// print_r($page);
		// die();

		$this->load->model('Image_model');

		$total_row = $this->Image_model->getSearchTotalImageCount();
		$baseUrl = base_url('index.php/Home/searchByCaptionOrID');
		$typeOfGet = "Search";

		// print_r($total_row);
		// die()	;

		$response_from_model = $this->getPaginate($page, $total_row, $baseUrl, $typeOfGet);


		// $this->load->model('Image_model');
		// $response_from_model  = $this->Image_model->searchImage();



		$response = $this->getImg($response_from_model);




		$search_query = $this->session->userdata('search_query');
		$data['search_query'] = $search_query;


		$data['thumbnails'] = $response;
		$this->load->view('home', $data);
	}
}
