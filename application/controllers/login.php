<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
        var $parent_page = "login";
	function __construct()
	{
            parent::__construct(); 
	}
        
        private function viewpage($page='v_login', $data=array())
        {
            echo $this->load->view('v_header', $data, true);
            echo $this->load->view('v_menu', $data, true);
            echo $this->load->view($this->parent_page.'/'.$page, $data, true);
            echo $this->load->view('v_footer', $data, true);
        }


        public function index()
	{
            $data['users'] = $this->m_users->getAll();
            $this->viewpage('v_login', $data);
	}
        
        function checklogin()
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $bol_login = $this->simpleloginsecure->login($username, $password);
            
            if ($bol_login) {
                $userdata = $this->session->all_userdata();
                $ut_id = $userdata['ut_id'];
                if ($ut_id == 1) {
                    redirect(site_url('admin'));
                } else if ($ut_id == 2) {
                    redirect(site_url('driver'));
                } else if ($ut_id == 3) {
                    redirect(site_url('passenger'));
                } else {
                    redirect(site_url('login'));
                }
            } else {
                redirect(site_url('login'));
            }
        }
        
        function logout()
        {
            $this->simpleloginsecure->logout();
            redirect(site_url('login'));
        }
}
