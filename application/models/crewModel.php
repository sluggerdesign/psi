<?php

class Crewmodel extends CI_Model {

	function getAffectedRows()
	{
    	return $this->db->affected_rows();
	}

	function getRecord($id) {
		$this->db->where('id', $id);
		$q = $this->db->get('crew');

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
		$q = $this->db->get('crew');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function getAssigned()
	{
		$this->db->order_by("name", "asc");
		$this->db->where('assigned', TRUE);
		$q = $this->db->get('assigned');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function create($data)
	{
		$this->db->insert('crew', $data);
		return;
	}

	function createAssigned($data)
	{
		$this->db->insert('assigned', $data);
		return;
	}

	function clearAssigned($id)
	{
		$this->db->where('work', $id);
		$this->db->delete('assigned');
	}

	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('crew', $data);
		return;
	}

	function updateAssigned($data, $id)
	{
		$this->db->where('job', $id);
		$this->db->update('assigned', $data);
		return;
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('crew');
	}
}
