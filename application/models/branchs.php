<?php

class branchs extends CI_Model {

	function getAffectedRows()
	{
    	return $this->db->affected_rows();
	}

  function getAll()
	{
		$q = $this->db->get('branches');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('branches');
	}
}
