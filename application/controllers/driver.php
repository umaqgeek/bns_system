<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Driver extends MY_Controller 
{
        var $parent_page = "driver";
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
            $this->viewpage();
	}
        
        function saveDriverLocation()
        {
            $latitud = $this->input->post('latitud');
            $longitud = $this->input->post('longitud');
            $u_id = $this->session->userdata('u_id');
            $dr_id = $this->m_driver->getIsExist($u_id);
            $data_dr = array('dr_lat_lon' => $latitud.",".$longitud);
            $this->m_conndb->edit('driver', 'dr_id', $dr_id, $data_dr);
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
        
        function readBusID()
        {
            $busx = $this->input->post('bu');
            $bu_id = $this->my_func->decrypt($busx);
            $bus = $this->m_conndb->get('bus bu', 'bu.bu_id', $bu_id);
            $qrcode = $this->input->post('qrcode');
            $lo_id = $this->my_func->decrypt($this->my_func->decrypt($qrcode));
            $lo = $this->m_conndb->get('location lo', 'lo.lo_id', $lo_id);
            if ( (isset($lo) && !empty($lo)) && (isset($bus) && !empty($bus)) ) {
                $u_id = $this->session->userdata('u_id');
                $dr_id = $this->m_driver->getIsExist($u_id, $bu_id);
                if ($dr_id == 0) {
                    $data_driver = array(
                        'u_id' => $u_id,
                        'bu_id' => $bu_id
                    );
                    $dr_id = $this->m_conndb->add('driver', $data_driver);
                }
                if ($dr_id) {
                    $data_driver_location = array(
                        'dr_id' => $dr_id,
                        'lo_id' => $lo_id,
                        'dl_datetime' => date('Y-m-d H:i:s')
                    );
                    $dl_id = $this->m_conndb->add('driver_location', $data_driver_location);
                    if ($dl_id) {
                        echo "Success ..";
                    } else {
                        echo "Failed!\nTry again ..";
                    }
                } else {
                    echo "Failed!\nTry again ..";
                }
            } else {
                echo "Failed!\nEither bus or location was invalid ..";
            }
            die();
        }
        
        function selectBus($stat=1)
        {
            if ($stat == 1) {
                $data['bus'] = $this->m_conndb->getAll('bus bu');
                echo $this->viewpage('v_select_bus', $data);
            } else if ($stat == 2) {
                $busx = $this->input->get('bu');
                $data['busx'] = $busx;
                echo $this->viewpage('v_scan', $data);
            }
        }
}
