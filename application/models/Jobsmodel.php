<?php

class Jobsmodel extends CI_Model {

	function getAffectedRows()
	{
    	return $this->db->affected_rows();
	}

	function getRecord($id) {
		$this->db->where('id', $id);
		$q = $this->db->get('jobs');

		if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
				$data[] = $row;
		}
		return $data;
		}
	}

  function getRecords()
	{
		$this->db->where('completed', NULL);
		$this->db->order_by("branch", "asc");
		$q = $this->db->get('jobs');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function getCompletedRecords()
	{
		$this->db->where('completed', TRUE);
		$this->db->order_by("branch", "asc");
		$q = $this->db->get('jobs');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function getActiveRecords($id) {
		$this->db->where('branch', $id);
		$this->db->order_by("timestamp", "asc");
		$q = $this->db->get('jobs');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function create($data)
	{
		$this->db->insert('jobs', $data);
		return;
	}

	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('jobs', $data);
		return;
	}

	function delete($id)
	{
		$this->db->where('project', $id);
		$this->db->delete('work');

		$this->db->where('job', $id);
		$this->db->delete('assigned');

		$this->db->where('id', $id);
		$this->db->delete('jobs');
	}
}
