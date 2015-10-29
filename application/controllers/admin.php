<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller 
{
        var $parent_page = "admin";
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
            $this->users('v_mainpage');
	}
        
        function qrgen()
        {
            $data['location'] = $this->m_location->getAll();
            if ($this->input->get('location')) {
                $lo_idx = $this->input->get('location');
                $lo_id = $this->my_func->decrypt($lo_idx);
                $data['lo'] = $this->m_conndb->get('location lo', 'lo.lo_id', $lo_id);
            }
            echo $this->viewpage('v_qrgen', $data);
        }
        
        function location_type()
        {
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('location_type');
                    
                    $crud->display_as('lt_desc', 'Location Type Name');
                    
                    $output = $crud->render();

                    $this->_example_output('v_mainpage', $output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
        
        function location()
        {
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('location');
                    $crud->set_relation('lt_id', 'location_type', 'lt_desc');
                    $crud->set_relation('lo_status', 'stats', 's_desc');
                    
                    $crud->display_as('lo_name', 'Location Name')
                            ->display_as('lt_id', 'Location Type')
                            ->display_as('lo_lat_lon', 'Latitud, Longitud')
                            ->display_as('lo_status', 'Status');
                    
                    $output = $crud->render();

                    $this->_example_output('v_mainpage', $output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
        
        function users($page)
        {
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('users');
                    $crud->set_relation('ut_id', 'user_type', 'ut_desc');
                    
                    $crud->set_relation('u_status', 'stats', 's_desc');
                    
                    $crud->display_as('u_fullname', 'Full Name')
                            ->display_as('u_username', 'Username')
                            ->display_as('u_password', 'Password')
                            ->display_as('ut_id', 'User Type')
                            ->display_as('u_status', 'Status');
                    
                    $crud->unset_add();
                    $crud->unset_edit();
                    $crud->unset_delete();
                    
                    $output = $crud->render();

                    $this->_example_output($page, $output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
        
        function buses()
        {
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('bus');
                    
                    $crud->set_relation('bu_status', 'stats', 's_desc');
                    
                    $crud->display_as('bu_plat', 'Bus Plat')
                            ->display_as('bu_status', 'Bus Status');
                    
                    $output = $crud->render();

                    $this->_example_output('v_mainpage', $output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
        
        function assign_driver()
        {
            try{
                    $crud = new grocery_CRUD();

                    $crud->set_theme('datatables');
                    $crud->set_table('users');
                    $crud->where('ut_id', 2);
                    
                    $crud->set_relation_n_n('bu_plat', 'driver', 'bus', 'u_id', 'bu_id', 'bu_plat', 'dr_id');
                    $crud->columns('u_fullname', 'bu_plat');
                    $crud->fields('u_fullname', 'bu_plat');
                    
                    $crud->display_as('u_fullname', 'Driver Fullname')
                            ->display_as('bu_plat', 'Bus Plat');
                    
                    $crud->unset_add();
                    
                    $output = $crud->render();

                    $this->_example_output('v_mainpage', $output);

            }catch(Exception $e){
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
            }
        }
        
        function _example_output($page, $output = null)
	{
            $this->viewpage($page, $output);
	}
}
