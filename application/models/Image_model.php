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
      'user_table_property_id' => $this->session->userdata('id')
    );
    return $this->db->insert('image_table', $data);
  }


  public function getImage()
  {
    $input_user_id = $this->session->userdata('id');

    // $this->db->where('user_table_property_id', $input_user_id);

    // $response = $this->db->get('image_table');


    $this->load->database();
    $query = $this->db->get_where('image_table', array('user_table_property_id' => $input_user_id));

    $results = $query->result_array();


    // echo $results;
    // print_r($results);
    // die();



    //if ($results->num_rows()==1) {
    return $results;
    // }else {
    // return false;
    // }
  }


  public function getByImageId($id)
  {
    $this->load->database();
    $result = $this->db->get_where('image_table', array('property_id' => $id));

  
    //  = $query->result_array();

    return $result->row(0);


    // $this->db->where('property_id', $id);
    // $response = $this->db->get('image_table');

    // print_r($response);
    // die();

    // if ($response->num_rows() == 1) {
    //   return $response;
    // } else {
    //   return false;
    // }
  }


  public function deleteImageById($id){
    $this->load->database();
    $result = $this->db->delete('image_table', array('property_id' => $id));
    return $result;
  }

  public function searchImage(){
    $this->load->database();
    // $this->db->select('*');
    $this->db->from('image_table');
    $this->db->where('user_table_property_id', $this->session->userdata('id'));
    $this->db->like('caption', $this->input->post('keyword'), 'both');
    $this->db->or_like('tag', $this->input->post('keyword'), 'both');
    // $this->db->query('SELECT * FROM image_table WHERE caption LIKE '%".$this->input->post('keyword')."%' OR tag LIKE '.$this->input->post('keyword').' AND user_table_property_id='.$this->session->userdata('id').'');

    // $this->db->query('SELECT * FROM image_table WHERE caption LIKE "%'.$this->input->post('keyword').'%" OR tag LIKE "%'.$this->input->post('keyword').'%" AND user_table_property_id="'.$this->session->userdata('id').'"');
    // print_r($this->db->get());
    // die();
    $query = $this->db->get();

    
    // $catch_data = $this->input->post('keyword',TRUE);
    // print_r($catch_data);
    // echo '<h1>'.$catch_data.'</h1>';
    // die();
    return $query->result_array();
  }
}
