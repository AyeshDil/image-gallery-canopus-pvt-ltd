<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imageview extends CI_Controller
{

  public function index($id)
  {
    $this->loadImage($id);
  }

  public function loadImage($id)
  {
    $this->load->model('Image_model');
    $response  = $this->Image_model->getByImageId($id);

    if ($response != false) {
      $image_data = array(
        'property_id' => $response->property_id,
        'caption' => $response->caption,
        'tags' => $response->tag,
        'image' => $response->image
      );

      $data['img_data'] = $image_data;
      $this->load->view('imageview', $data);
    } else {
      //else code...
    }
  }

  public function deleteImage($id)
  {
    $this->load->model('Image_model');
    $response  = $this->Image_model->deleteImageById($id);
    redirect('Home');
  }
}
