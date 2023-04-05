<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->loadImage();
		// $this->load->view('home');
	}

	public function  loadImage()
	{

		$this->load->model('Image_model');
		$response  = $this->Image_model->getImage();

		// ==========================================

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
				'image'=>$thumbnailData, 
				'id'=>$response_image['property_id']
			);
		}
		// print_r($thumbnail_array);
		// 	die();
		// Pass the thumbnail filenames to the view
		$data['thumbnails'] = $thumbnail_array;
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




}
