<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Passenger extends MY_Controller 
{
        var $parent_page = "passenger";
	function __construct()
	{
            parent::__construct(); 
	}
        
        private function viewpage($page='v_mainpage', $data=array())
        {
            echo $this->load->view('v_header', $data, true);
            echo $this->load->view($this->parent_page.'/'.'v_menu', $data, true);
            echo $this->load->view($this->parent_page.'/'.$page, $data, true);
            echo $this->load->view('v_footer', $data, true);
        }

        public function index()
	{
            $this->viewpage('v_mainpage');
	}
        
        function getList1()
        {
//            $data['driver_location'] = $this->m_driver_location->getAll();
//            echo $this->viewpage('ajax/v_get_list', $data);
            $data['driver'] = $this->m_driver->getAll();
            $data['location'] = $this->m_location->getAll();
            echo $this->viewpage('ajax/v_get_map', $data);
        }
        
        function testGroceryCrud($page)
        {
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    
                    $crud->set_table('users');
                    
                    $output = $crud->render();

                    $this->_example_output($page, $output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
        
        function _example_output($page, $output = null)
	{
            $this->viewpage($page, $output);
	}
        
}