<?php

class Image_model extends CI_Model
{

  function save_upload($id, $file_data)
  {

    $data = array(
      'property_id' => $id,
      'caption' => $this->input->post('caption'),
      'tag' => $this->input->post('tags'),
      'image' => file_get_contents($file_data['full_path']),
      'user_table_property_id' => $this->session->userdata('id'),
      'date_time' => date("Y-m-d h:i:sa")
    );
    return $this->db->insert('image_table', $data);
  }


  public function getImage($per_page, $offset)
  {
    $input_user_id = $this->session->userdata('id');

    $this->load->database();
    $this->db->limit($per_page, $offset);
    $this->db->order_by("date_time", "desc");
    $query = $this->db->get_where('image_table', array('user_table_property_id' => $input_user_id));

    $results = $query->result_array();
    return $results;
  }


  public function getByImageId($id)
  {
    $this->load->database();
    $result = $this->db->get_where('image_table', array('property_id' => $id));
    return $result->row(0);
  }


  public function deleteImageById($id)
  {
    $this->load->database();
    $result = $this->db->delete('image_table', array('property_id' => $id));
    return $result;
  }

  public function searchImage($per_page, $offset)
  {
    $parameters = $this->input->get('keyword');

    $this->db->limit($per_page, $offset);
    $this->db->where('user_table_property_id', $this->session->userdata('id'));
    $this->db->order_by("date_time", "desc");
    $this->db->like('caption', $parameters, 'both');
    $this->db->or_like('tag', $parameters, 'both');

    $query = $this->db->get_where('image_table', array('user_table_property_id' => $this->session->userdata('id')));

    return $query->result_array();
  }


  public function getTotalImageCount()
  {
    $this->load->database();
    $imageList = $this->db->select('*')->from('image_table')->where('user_table_property_id', $this->session->userdata('id'))->get();

    return $imageList->num_rows();
  }

  public function getSearchTotalImageCount()
  {

    $parameters = $this->input->get('keyword');

    $this->load->database();
    // $this->db->select('*');
    $this->db->from('image_table');
    $this->db->where('user_table_property_id', $this->session->userdata('id'));
    $this->db->like('caption', $parameters, 'both');
    $this->db->or_like('tag', $parameters, 'both');

    $query = $this->db->get();

    return $query->num_rows();
  }
}
