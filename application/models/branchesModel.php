<?php

class Branchesmodel extends CI_Model {

	function getAffectedRows()
	{
    	return $this->db->affected_rows();
	}

	function getRecord($id) {
		$this->db->where('id', $id);
		$q = $this->db->get('branches');

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
		$q = $this->db->get('branches');

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function getActiveRecords() {
		$this->db->select("jobs.*,branches.*");
		$this->db->from("jobs");
		$this->db->join("branches","branches.id = jobs.branch");
		$this->db->order_by('branches.name', 'asc');
		$this->db->group_by('branches.name');
		$this->db->distinct();
		$q = $this->db->get();

		if($q->num_rows() > 0){
				foreach($q->result() as $row) {
					$data[] =$row;
			}
			return $data;
			}
	}

	function create($data)
	{
		$this->db->insert('branches', $data);
		return;
	}

	function update($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('branches', $data);
		return;
	}

	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('branches');
	}
}
