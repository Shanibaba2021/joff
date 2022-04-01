<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    
    function __construct(){
        parent:: __construct();
        $this->load->model('Login_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }
    public function userlist(){
        if($this->session->userdata('roleid') == 'admin'){
            $this->load->helper('url');
            $this->load->model('login_model');
            $result['h'] = $this->login_model->get_user();
            $this->load->view('listuser',$result);
        }
        else {
            redirect('joff/admin');
        }
    }

    public function offerlist(){
        if($this->session->userdata('roleid')=='admin')
        {
            $this->load->helper('url');
            $this->load->model('login_model');
            $result['h'] = $this->login_model->get_offer();
            $this->load->view('offerlist',$result);
        }
        else{
            redirect('joff/admin');
        }
    }
    public function users(){
        $this->load->helper('url');
        $this->load->view('users');
    }

    public function vender(){

        if($this->session->userdata('password')== null)
        {
            $this->load->helper('url');
            $this->load->view('vender');
        }
        else{
            redirect('Login/store');
        }

    }

    public function store(){
        if($this->input->post('submit')){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('category', 'category', 'required',
            array('required' => 'Please enter a  %s.'));
            $this->form_validation->set_rules('name', 'name', 'required|is_unique[stores.name]',
            array('required' => 'Please enter a  %s.','is_unique'     => 'This %s already exists.'));
            $this->form_validation->set_rules('address', 'address', 'required',
            array('required' => 'Please enter a  %s.'));
            $this->form_validation->set_rules('lat', 'lat', 'required|numeric',
            array('required' => 'Please enter a  %s.','numeric' => 'Please enter a numbers only!'));
            $this->form_validation->set_rules('longg', 'longg', 'required|numeric',
            array('required' => 'Please enter a  %s.','numeric' => 'Please enter a numbers only!'));
            if (empty($_FILES['product_image']['name']))
            {
                $this->form_validation->set_rules('product_image', 'image', 'required');
            }
            if ($this->form_validation->run() == FALSE)
            {  
                $this->load->view('registerstore');
            }
            else{
                $this->load->helper('url');
                $this->load->model('Login_model');
                $this->load->library('upload');
                $config['upload_path'] = 'uploads';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048000'; 
                $config['max_width'] = '20000'; 
                $config['max_height'] = '20000';
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if($this->upload->do_upload('product_image'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    $image = $_FILES['product_image']['name'];
                }
                else{
                    print_r($this->upload->display_errors());
                } 
                $this->load->helper('url');
                $data['student'] =  $this->Login_model->movie($image);
                $this->load->library('form_validation');
                $this->load->view('registerstore',$data);
                redirect('Login/store');
            }
        }
        else{
            $this->load->view('registerstore');
        }
        
    }

    public function store1(){
        $this->load->helper('url');  
        $this->load->view('registerstore');

    }
    
    public function loginstore(){

        $this->load->library('session');
        if($this->session->userdata('userid') == null)
        {
            $this->load->helper('url');
            $this->load->view('loginstore');
        }
        else{
            redirect('User/vander_dash');
        }

    }

    public function loginstore1(){

        $this->load->library('session');
        $name=$this->input->post('name');
        $password=$this->input->post('password');

        $que=$this->db->query("select * from stores where name='".$name."' and password='$password'");
        $row = $que->num_rows();
        if($row > 0)
        {
            $userdata =  $que->result_array(); 
            $this->session->set_userdata($userdata[0]);
            if($this->session->userdata('password') == '123456'){
                echo json_encode(array("status" => "1" ,"msg" => "login success fully","data" => $userdata[0]));
            }
        }
        else
        {
            $userdata =  $que->result_array(); 
            echo json_encode(array("status" => "0" ,"msg" => "login failed","data" => []));
        }
    }

    public function listoffer(){

        if($this->session->userdata('roleid') == 'Vender')
        {
            $this->load->helper('url');
            $this->load->database();  
            $this->load->model('login_model');   
            $data['h']=$this->login_model->listoffer();  
            $this->load->view('listoffer', $data);
        }
        else{
            
            redirect('login/vender_login');
            
        }
    } 

    public function details()
    {
        if($this->session->userdata('roleid') == 'Vender')
        {
            $this->load->model('login_model');
            $result['h'] = $this->login_model->get_user_data();
            $this->load->view('details_vender',$result);
        }
        else{
            
            redirect('login/vender_login');
            
        }
    }

    public function updated()
	{
        $id = $this->input->post('id');
        $this->load->model('Login_model');

        $this->load->helper('url');
        $this->load->model('Login_model');
        $this->load->library('upload');
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048000'; 
        $config['max_width'] = '20000'; 
        $config['max_height'] = '20000';
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if($this->upload->do_upload('product_image'))
        {
            $data = array('upload_data' => $this->upload->data());
            $image = $_FILES['product_image']['name'];
        }
        else{
            print_r($this->upload->display_errors());
        } 
        $result =  $this->Login_model->updated($id,$image);
        if($result){
            echo json_encode(array('status'=>'1','msg'=>'data updated successfull!','data'=>$result));
        }
    }
    

    // For Exercise here
    public function exercise()
    {
        $this->load->helper('url');
        // $this->load->view('form');
        $data['data']=$this->Login_model->display_records();
        $this->load->view('form',$data);
    }

    public function form()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fname', 'fname', 'required',
        array('required' => 'Please enter a  %s.','label' => 'Fname'));
        $this->form_validation->set_rules('lname', 'lname', 'required',
        array('required' => 'Please enter a  %s.'));
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[person.username]',
        array('required' => 'Please enter a  %s.','is_unique'     => 'This %s already exists.'));
        $this->form_validation->set_rules('email', 'email', 'required|is_unique[person.email]',
        array('required' => 'Please enter a  %s.','is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('mobile', 'mobile', 'required',array('required' => 'Please enter a  %s.'));
        $this->form_validation->set_rules('password', 'password', 'required|numeric',
        array('required' => 'Please enter a  %s.','numeric' => 'Please enter a numbers only!'));
        if ($this->form_validation->run() == FALSE)
        {
            $array = array(
                'fname' => form_error('fname'),
                'lname' => form_error('lname'),
                'username' => form_error('username'),
                'email' => form_error('email'),
                'password' => form_error('password'),
                'mobile' => form_error('mobile'),
            );
            echo json_encode($array);
            // echo json_encode(array('status'=>'0','msg'=>'error','data'=> validation_errors() ));           
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->model('Login_model');
            $result = $this->Login_model->createData();
            if($result){
                echo json_encode(array('status'=>'1','msg'=> 'Data Insert Successfully!', 'data'=>$result));
            }
        }
    }

    // public function fetchdata()
	// {
    //     $this->load->model('login_model');
    //     $this->load->helper('url');
	// 	$resultList = $this->login_model->fetchAllData('*','person',array());
		
	// 	$result = array();
	// 	$i = 1;
	// 	foreach ($resultList as $key => $value) {

	// 		$result['data'][] = array(
    //             $i++,
    //             $value['fname'],
    //             $value['lname'],
    //             $value['username'],
    //             $value['email'],
    //             $value['mobile'],
    //             $value['password'],
	// 		);
	// 	}
	// 	echo json_encode($result);
	// }

    public function fetchdata()
	{
        $this->load->model('login_model');
		$resultList = $this->login_model->fetchAllData('*','person',array());
		$result = array();
		$i = 1;
		foreach ($resultList as $key => $value) {

			$result['data'][] = array(
				$i++,
                $value['fname'],
                $value['lname'],
                $value['username'],
                $value['email'],
                $value['mobile'],
                $value['password'],
			);
		}
		echo json_encode($result);
	}
}
