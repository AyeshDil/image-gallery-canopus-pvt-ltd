<?php

class User_model extends CI_Model
{
  function insertUserData($id)
  {
    $data = array(
      'property_id' => $id,
      'first_name' => $this->input->post('fname',TRUE),
      'last_name' => $this->input->post('lname',TRUE),
      'user_name' => $this->input->post('uname',TRUE),
      'email' => $this->input->post('email',TRUE),
      'password' => sha1($this->input->post('password',TRUE)),
    );
    return $this->db->insert('user_table', $data);
  }

  function checkUserData(){
    $input_email = $this->input->post('email',TRUE);
    $input_password = sha1($this->input->post('password',TRUE));

    $this->db->where('email', $input_email);
    $this->db->where('password', $input_password);
    $response = $this->db->get('user_table');
    
    if($response->num_rows()==1){
      return $response->row(0);
    } else {
      return false;
    }

  }
}
