<?php
  class M_driver extends CI_Model {
	  
	  function getIsExist($u_id, $bu_id=-1) {
		  $this->db->select('*');
		  $this->db->from('driver dr');
                  $this->db->where('dr.u_id', $u_id);
                  if ($bu_id != -1) {
                      $this->db->where('dr.bu_id', $bu_id);
                  }
		  $q = $this->db->get();
		  if($q->num_rows() > 0) {
			  foreach($q->result() as $r) {
				  $d[] = $r;
			  }
			  return $d[0]->dr_id;
		  } else {
                          return 0;
                  }
	  }
          
          function getAll() {
		  $this->db->select('*');
		  $this->db->from('driver dr');
                  $this->db->join('users u', 'u.u_id = dr.u_id', 'left');
                  $this->db->join('bus bu', 'bu.bu_id = dr.bu_id', 'left');
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