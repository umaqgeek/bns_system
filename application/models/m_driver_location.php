<?php
  class M_driver_location extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('driver_location dl');
                  $this->db->join('driver dr', 'dr.dr_id = dl.dr_id', 'left');
                  $this->db->join('location lo', 'lo.lo_id = dl.lo_id', 'left');
                  $this->db->join('users u', 'u.u_id = dr.u_id', 'left');
                  $this->db->join('bus bu', 'bu.bu_id = dr.bu_id', 'left');
                  $this->db->group_by('dl.dl_id');
                  $this->db->order_by('dl.dl_datetime', 'DESC');
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d;
		  }
	  }
	
  }

?>