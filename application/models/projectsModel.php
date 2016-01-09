<?php

class projectsModel extends CI_Model {

	function getAffectedRows()
	{
    	return $this->db->affected_rows();
	}

	function getRecord($id) {
		$this->db->where('id', $id);
		$q = $this->db->get('projects');

		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
		}
		return $data;
		}
	}

  function getRecords()
	{
		$q = $this->db->get('projects');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function create($data)
	{
		$this->db->insert('projects', $data);
		return;
	}

	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('projects', $data);
		return;
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('projects');
	}
}
