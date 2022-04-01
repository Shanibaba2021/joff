<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function sign_up(){
        $this->load->library('session');
        if($this->session->userdata('roleid') == null)
        {
            $this->load->helper('url');
            $this->load->view('sign_up');
        }
        else{
            redirect('index.php/Login/dash');
        }
    }
    public function check(){
        $this->load->library('session');
        $username=$this->input->post('username');
        $password=$this->input->post('password');

        $que=$this->db->query("select * from users where username='".$username."' and password='$password'");
        $row = $que->num_rows();
        if($row > 0)
        {
            $userdata =  $que->result_array(); 
            $this->session->set_userdata($userdata[0]);
            if($this->session->userdata('roleid') == 'admin'){
                echo json_encode(array("status" => "1" ,"msg" => "login success fully","data" => $userdata[0]));
            }
        }
        else
        {
            $userdata =  $que->result_array(); 
            echo json_encode(array("status" => "0" ,"msg" => "login failed","data" => []));
        }
    }
    function dash(){
        $this->load->library('session');
        if($this->session->userdata('roleid')=='admin')
        {
            $this->load->helper('url');
            $this->load->view('dash');
        }
        else{
            redirect('joff/admin');
        }
    }
    public function logout(){
        $this->load->library('session');
        $this->session->unset_userdata('roleid');
        $this->session->sess_destroy();
        redirect('joff/admin');
    }
    public function button(){
        $this->load->library('session');
        if($this->session->userdata('roleid') == null)
        {
            $this->load->helper('url');
            $this->load->view('user_vender');
        }
        else{
            redirect('User/vander_dash');
        }
    }
    public function vender_sign_1(){

        $this->load->helper('url');
        $this->load->model('Login_model');
        $data['student'] =  $this->Login_model->list12();
        // print_r( $data['student']);
        $this->load->view('vender_sign',$data);

    }
    public function vender_sign(){

        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('fname', 'fname', 'required',
            array('required' => 'Please enter a  %s.'));
            $this->form_validation->set_rules('lname', 'lname', 'required',
            array('required' => 'Please enter a  %s.'));
            $this->form_validation->set_rules('username', 'username', 'required|is_unique[users.username]',
            array('required' => 'Please enter a  %s.','is_unique'     => 'This %s already exists.'));
            $this->form_validation->set_rules('email', 'email', 'required|is_unique[users.email]',
            array('required' => 'Please enter a %s.','is_unique'     => 'This %s already exists.'));
            $this->form_validation->set_rules('address', 'address', 'required',
            array('required' => 'Please enter a  %s.'));
            $this->form_validation->set_rules('roleid', 'roleid', 'required',
            array('required' => 'Please enter a  %s.'));
            $this->form_validation->set_rules('password', 'password', 'required|numeric',
            array('required' => 'Please enter a  %s.','numeric' => 'Please enter a numbers only!'));

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->helper('url');
                $this->load->model('Login_model');
                $data['student'] =  $this->Login_model->list12();
                $this->load->view('vender_sign',$data);
            }
            else
            {
                $this->load->model('Login_model');
                $data['user'] =  $this->Login_model->vender_sign();
                $this->load->view('vender_sign',$data);
                redirect('Login/vender_login');
            }
        }
        else{
            $this->load->view('vender_sign');
        }
    }
    public function vender_login(){

        $this->load->library('session');
        if($this->session->userdata('password') == null)
        {
            $this->load->helper('url');
            $this->load->view('vender_login');
        }
        else{
            
            redirect('Login/store');
            
        }

    }
    public function check_login()
    {

        $this->load->library('session');
        $username=$this->input->post('username');
        $password=$this->input->post('password');

        $que=$this->db->query("select * from users where username='".$username."' and password='$password'");
        $row = $que->num_rows();
        if($row > 0)
        {
            $userdata =  $que->result_array(); 
            $this->session->set_userdata($userdata[0]);
            if($this->session->userdata('roleid') == 'Vender'){
                if($this->session->userdata('storeid') == '0'){
                    echo json_encode(array("status" => "1" ,"msg" => "login successfully","data" => $userdata[0]));
                }
                else{
                    echo json_encode(array("status" => "2" ,"msg" => "login successfully","data" => $userdata[0]));
                }
            }
        }
        else
        {
            $userdata =  $que->result_array(); 
            echo json_encode(array("status" => "0" ,"msg" => "login failed","data" => []));
        }

    }
    public function store(){

        if($this->session->userdata('password') == '123456')
        {
            $this->load->helper('url');
            $userid = $this->input->get('userid');
            $this->load->model('login_model');
            $data['h']=$this->login_model->userid();  
            $this->load->view('store',$data);
        }
        else
        {
            redirect('Login/vender_login');
        }
    }

    public function logout_1(){
        $this->load->library('session');
        $this->session->unset_userdata('roleid');
        $this->session->sess_destroy();
        redirect('joff');
    }

    public function addoffers(){
        
        if($this->session->userdata('roleid') == 'Vender')
        {
            
            if($this->input->post('submit'))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('userid', 'userid', 'required',
                array('required' => 'Please enter a  %s.'));
                $this->form_validation->set_rules('startdate', 'startdate', 'required',
                array('required' => 'Please enter a  %s.'));
                $this->form_validation->set_rules('duration', 'duration', 'required',
                array('required' => 'Please enter a  %s.'));
                if (empty($_FILES['product_image']['name']))
                {
                    $this->form_validation->set_rules('product_image', 'Document', 'required');
                }
                if ($this->form_validation->run() == FALSE)
                {
                    // die("ajkna");
                    $this->load->view('addoffer');
                }
                else
                {
                    $this->load->library('upload');
                    $this->load->model('login_model');
                    $config['upload_path'] = 'uploads/offers';
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
                    $data['student'] =  $this->login_model->offers($image);
                    $this->load->view('addoffer',$data);
                    redirect('User/listoffer');
                }      
            }
            else
            {
                $this->load->view('addoffer');
            }
        }
        else
        {
            
            redirect('login/vender_login');
            
        }

    }
    public function store1(){
        if($this->session->userdata('password') == '123456')
        {
            $this->load->helper('url');
            $this->load->view('Store1');
        }
        else
        {
            redirect('Login/vender_login');   
        }
    }

}
