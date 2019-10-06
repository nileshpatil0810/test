<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Auth extends CI_Controller {
  
    public function __construct(){
        parent::__construct();
        $this->load->model('Form_model');
        $this->load->helper(array('url','html','form'));
        $this->user_id = $this->session->userdata('user_id');
    }
  
  
    public function index()
    {
      $this->load->view('login');
      $this->load->view('include/auth_common');
    }

    public function register(){
        $this->load->view('register');
        $this->load->view('include/auth_common');
    }

    public function post_login(){
 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Not Proper %s');
 
        if ($this->form_validation->run() === FALSE){  
            echo json_encode(array("code" => 0, "data" => "", "msg" => validation_errors()));
        }else{   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $check = $this->Form_model->auth_check($data);
            
            if(!empty($check['data']) && $check['code'] == "1"){
                 $user = array(
                 'user_id' => $check['data']->id,
                 'email' => $check['data']->email,
                 'first_name' => $check['data']->first_name,
                 'last_name' => $check['data']->last_name
                );
  
              $this->session->set_userdata($user);
              echo json_encode(array("code" => 1, "data" => "", "msg" => $check['msg']));
              //redirect(base_url('items/')); 
            }else{
                echo json_encode(array("code" => 0, "data" => "", "msg" => $check['msg']));
            }
        }
         
    }   
    public function post_register()
    {
        
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_message('required', 'Not Proper %s');
        if ($this->form_validation->run() === FALSE){ 
            //$data['error'] = validation_errors();
            echo json_encode(array("code" => 0, "data" => "", "msg" => validation_errors()));
        }else{   
            $data = array(
               'first_name' => $this->input->post('first_name'),
               'last_name' => $this->input->post('last_name'),
               'mobile_number' => $this->input->post('contact_no'),
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
             );
   
            $check = $this->Form_model->insert_user($data);

            if($check['code'] == '1'){
                $user = array(
                 'user_id' => $check['user_id'],
                 'email' => $this->input->post('email'),
                 'first_name' => $this->input->post('first_name'),
                 'last_name' => $this->input->post('last_name'),
                );
                $this->session->set_userdata($user);
                echo json_encode(array("code" => 1, "data" => "", "msg" => $check['msg']));
             }else{
                echo json_encode(array("code" => 0, "data" => "", "msg" => $check['msg']));
             }     
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }  
      
   public function dashboard(){
       if(empty($this->user_id)){
        redirect(base_url('auth'));
      }
       $this->load->view('items');
       $this->load->view('include/items_common');
    }
}