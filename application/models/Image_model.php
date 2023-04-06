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

    // $this->db->where('user_table_property_id', $input_user_id);

    // $response = $this->db->get('image_table');

    // all done part
    // $this->load->database();
    // $this->db->limit($per_page, $offset);
    // $query = $this->db->get_where('image_table', array('user_table_property_id' => $input_user_id));

    // $results = $query->result_array();

    // ...all done part


    $this->load->database();
    $this->db->limit($per_page, $offset);
    $this->db->order_by("date_time", "desc");
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


  public function deleteImageById($id)
  {
    $this->load->database();
    $result = $this->db->delete('image_table', array('property_id' => $id));
    return $result;
  }

  public function searchImage($per_page, $offset)
  {
    // $input_user_id = $this->session->userdata('id');
    // $this->load->database();
    // // $this->db->select('*');
    // // $this->db->from('image_table');
    // $this->db->limit($per_page, $offset);
    // $this->db->like('caption', $this->input->post('keyword'), 'both');
    // $this->db->or_like('tag', $this->input->post('keyword'), 'both');
    //  $query = $this->db->get_where('image_table', array('user_table_property_id' => $input_user_id));
    // if ($_SESSION['search_keyword'] == "") {
    //   print_r("kela unoooo");
    //   die();
    // } else {
    // $this->db->from('image_table');

    //   $my = $this->uri->segment('3');

    // print_r($my);
    // die();

    // $searchT = $this->session->userdata('search_query'); ......
    //   print_r($this->input->get('keyword'));
    // die();

    $parameters = $this->input->get('keyword');

    // $input_user_id = $this->session->userdata('id')

    $this->db->limit($per_page, $offset);
    $this->db->where('user_table_property_id', $this->session->userdata('id'));
    $this->db->order_by("date_time", "desc");
    $this->db->like('caption', $parameters, 'both');
    $this->db->or_like('tag', $parameters, 'both');

    $query = $this->db->get_where('image_table', array('user_table_property_id' => $this->session->userdata('id')));
    // $query = $this->db->get('image_table');

    // $this->session->set_userdata('search_query', $query->result_array()); ........

    // $sql = "select * from image_table where user_table_property_id='".$this->session->userdata('id')."' and (caption like '%".$_SESSION['search_keyword']."%' or tag like '%".$_SESSION['search_keyword']."%') ;";
    // $query = $this->db->query($sql);
    // $query = $this->db->get();
    return $query->result_array();
    // }

    // $this->db->query('SELECT * FROM image_table WHERE caption LIKE '%".$this->input->post('keyword')."%' OR tag LIKE '.$this->input->post('keyword').' AND user_table_property_id='.$this->session->userdata('id').'');

    // $this->db->query('SELECT * FROM image_table WHERE caption LIKE "%'.$this->input->post('keyword').'%" OR tag LIKE "%'.$this->input->post('keyword').'%" AND user_table_property_id="'.$this->session->userdata('id').'"');
    // print_r($this->db->get());
    // die();
    //  $this->db->get();

    // print_r($query->num_rows());
    // die();

    // $catch_data = $this->input->post('keyword',TRUE);
    // print_r($catch_data);
    // echo '<h1>'.$catch_data.'</h1>';
    // die();

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
    // $this->db->query('SELECT * FROM image_table WHERE caption LIKE '%".$this->input->post('keyword')."%' OR tag LIKE '.$this->input->post('keyword').' AND user_table_property_id='.$this->session->userdata('id').'');

    // $this->db->query('SELECT * FROM image_table WHERE caption LIKE "%'.$this->input->post('keyword').'%" OR tag LIKE "%'.$this->input->post('keyword').'%" AND user_table_property_id="'.$this->session->userdata('id').'"');
    // print_r($this->db->get());
    // die();
    $query = $this->db->get();
    // $SearchText = $this->input->post('keyword');......


    // $this->session->userdata('search_keyword');
    // $_SESSION['search_keyword']=$this->input->post('keyword');.....
    // $this->session->set_userdata($user_data);
    // print_r($_SESSION['search_keyword']);
    // die();

    return $query->num_rows();
  }
}
