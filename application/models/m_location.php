<?php
  class M_location extends CI_Model {
	  
	  function getAll() {
		  $this->db->select('*');
		  $this->db->from('location lo');
                  $this->db->join('location_type lt', 'lt.lt_id = lo.lt_id', 'left');
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