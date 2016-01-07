<?php

class branchs extends CI_Model {

	function getAffectedRows()
	{
    	return $this->db->affected_rows();
	}

  function getBranches()
	{
		$q = $this->db->get('branches');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}``
			return $data;
			}
	}
}
