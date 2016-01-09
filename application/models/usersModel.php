<?php

class usersModel extends CI_Model {

	function getAffectedRows()
	{
    	return $this->db->affected_rows();
	}

	function getRecord($id) {
		$this->db->where('id', $id);
		$q = $this->db->get('users');

		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
		}
		return $data;
		}
	}

  function getRecords()
	{
		$this->db->order_by("name", "asc");
		$q = $this->db->get('users');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function create($data)
	{
		$this->db->insert('users', $data);
		return;
	}

	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return;
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
}
