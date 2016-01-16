<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller {

	public function create() {
		$this->authorize();
		$this->load->model('Workmodel');
		$this->load->model('Crewmodel');

		if($_POST) {
			$job = $this->input->post('id');
			$task = $this->sanitize->trimFirstCaps($this->input->post('task'));
			$crew = $this->input->post('crew');
			$notes = $this->input->post('notes');
			$start = $this->input->post('start');
			$end = $this->input->post('end');

			if ($crew) {
				$arr = array();
				foreach ($crew as $c) {
					$name = $this->Crewmodel->getRecord($c);
					$name = $name[0]->name;
					array_push($arr, $name);
				}
				$work_crew = implode(', ', $arr);
			} else {
				$work_crew = NULL;
			}

			$data = array(
				'project' => $job,
				'task' => $task,
				'crew' => $work_crew,
				'notes' => $notes,
				'start' => $start,
				'end' => $end
			);

			$this->Workmodel->create($data);
			$workid = $this->db->insert_id();

			if (isset($crew)) {
				foreach ($crew as $c) {
					$name = $this->Crewmodel->getRecord($c);
					$name = $name[0]->name;

					$data = array(
						'job' => $job,
						'work' => $workid,
						'crew' => $c,
						'name' => $name
					);

					$this->Crewmodel->createAssigned($data);
				}
			}

			$this->session->set_flashdata('addedtask', $task);
			redirect('jobs/edit/' . $job);
		}
	}

	public function edit() {
		$this->authorize();
		$this->load->model('Workmodel');
		$this->load->model('Jobsmodel');
		$this->load->model('Crewmodel');

		$id = $this->uri->segment(3);

		if($_POST) {
			$job = $this->input->post('id');
			$task = $this->sanitize->trimFirstCaps($this->input->post('task'));
			$crew = $this->input->post('crew');
			$notes = $this->input->post('notes');
			$start = $this->input->post('start');
			$end = $this->input->post('end');

			if ($crew) {
				$arr = array();
				foreach ($crew as $c) {
					$name = $this->Crewmodel->getRecord($c);
					$name = $name[0]->name;
					array_push($arr, $name);
				}
				$work_crew = implode(', ', $arr);
			}

			$data = array(
				'project' => $job,
				'task' => $task,
				'crew' => $work_crew,
				'notes' => $notes,
				'start' => $start,
				'end' => $end
			);

			$this->Workmodel->update($data, $id);
			$this->Crewmodel->clearAssigned($id);

			foreach ($crew as $c) {
				$name = $this->Crewmodel->getRecord($c);
				$name = $name[0]->name;

				$data = array(
					'job' => $job,
					'work' => $id,
					'crew' => $c,
					'name' => $name
				);

				$this->Crewmodel->createAssigned($data);
			}

			$this->session->set_flashdata('updatedtask', $task);
			redirect('jobs/edit/' . $job);
		}

		$id = $this->uri->segment(3);
		$data['task'] = $this->Workmodel->getRecord($id);

		echo json_encode($data['task']);
	}

	public function delete() {
		$this->authorize();
		$this->load->model('Workmodel');

		$this->Workmodel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removedtask', urldecode($this->uri->segment(4)));
		redirect('jobs/edit/' . $this->uri->segment(5));
	}

	// Authentication

	private
	function authorize()
	{
	  if($this->session->userdata('name')) {
	  	return true;
	  } else {
		redirect('login');
		}
	}
}
