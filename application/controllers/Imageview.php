<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imageview extends CI_Controller {

	public function index($id)
	{
    $this->loadImage($id);
		// $this->load->view('imageview');
	}

  public function loadImage($id){
    $this->load->model('Image_model');
		$response  = $this->Image_model->getByImageId($id);

    // print_r($response);
    // die();

    if ($response != false) {

      // print_r($response['property_id']);
      // die();
				
      $image_data = array(
        'property_id' => $response->property_id,
        'caption' => $response->caption,
        'tags' => $response->tag,
        'image' => $response->image
      );

      $data['img_data'] = $image_data;
		  $this->load->view('imageview', $data);
      

    } else {
      
    }

  }

  public function deleteImage($id)
  {

    $this->load->model('Image_model');
		$response  = $this->Image_model->deleteImageById($id);
    // print_r($response);
    // die();

    redirect('Home');
  }

}