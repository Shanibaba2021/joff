<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function vender_sign(){
        if($this->input->post('submit')){
			$data = array( 
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
            'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'address' => $this->input->post('address'),
			'roleid' => $this->input->post('roleid'),
			);
			$sql = $this->db->insert('users',$data);  
			return $sql;
		}
    }
	function list12()
	{
        $query = $this->db->get('role'); 
        return $query->result_array();
	}
	function list1()
	{
        $query = $this->db->get('users'); 
        return $query->result_array();
	}
	function listoffer()
	{
		$id = $this->session->userdata('id');
		$query = $this->db->where('userid',$id)->get('offers');  
		return $query;
	}
	function userid()
	{
		$query = $this->db->get('users');  
		return $query;
	}
	public function movie($image){

		if($this->input->post('submit')){
			$data = array(
			'userid' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'lat' => $this->input->post('lat'),
			'longg' => $this->input->post('longg'),
			'category' => $this->input->post('category'),
			'userfile' => $image
			);
			$this->db->insert('stores',$data); 

			$dt = array(
				$id = 1,
				$userid = $this->session->userdata('id')
			);
			$query = $this->db->query("update users SET storeid = '$id' where id=$userid");
			return true;
		}
		
    }
	function offers($image){
		$data = array(
			'userid' => $this->input->post('userid'),
			'startdate' => $this->input->post('startdate'),
			'duration' => $this->input->post('duration'),
			'userfile'    => $image
		);
		$this->db->insert('offers', $data);

	}
	public function get_user_data()
	{
		$id = $this->session->userdata('id');
		$query = $this->db->where('userid',$id)->get('stores');  
		return $query;
	}
	public function updated($id,$image){
		$query = $this->db->where('id',$id)->get('stores');
			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$lat = $this->input->post('lat');
			$longg = $this->input->post('longg');
			$category = $this->input->post('category');
			$product_image = $image;
			$query=$this->db->query("update stores SET name='$name',address='$address',lat='$lat',longg='$longg', userfile='$product_image', address='$address',category='$category' where id='$id' "); 
			return true;
	}
	public function get_user()
	{
		$query = $this->db->where('roleid','Vender')->get('users');  
		return $query;
	}
	public function get_offer()
	{
		$query = $this->db->get('offers');  
		return $query;
	}

	// For Exercise 
	public function createData()
	{
		$data = array(
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'password' => $this->input->post('password')
		);
		$query = $this->db->insert('person',$data);
		return $query;
	}

	public function display_records()
	{
		$query=$this->db->query("select * from person");
		return $query->result();
	}
	public function fetchAllData($data,$tablename,$where)
	{
		$query = $this->db->select($data)
						->from($tablename)
						->where($where)
						->get();
		return $query->result_array();
	}
}
