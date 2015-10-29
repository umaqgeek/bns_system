<?php
  class M_users extends CI_Model {
	  
          
          function getAll() {
		  $this->db->select('*');
		  $this->db->from('users u');
                  $this->db->join('user_type ut', 'ut.ut_id = u.ut_id', 'left');
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