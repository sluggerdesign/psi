<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller {

	public function create() {
		$this->authorize();
		$this->load->model('Workmodel');

		if($_POST) {
			$project = $this->input->post('id');
			$task = $this->sanitize->trimFirstCaps($this->input->post('task'));
			$crew = $this->input->post('crew');
			$notes = $this->input->post('notes');
			$start = $this->input->post('start');
			$end = $this->input->post('end');

			if ($crew) {
				$crew = implode(', ', $crew);
			}

			$data = array(
				'project' => $project,
				'task' => $task,
				'crew' => $crew,
				'notes' => $notes,
				'start' => $start,
				'end' => $end
			);

			$this->Workmodel->create($data);

			$this->session->set_flashdata('addedtask', $task);
			redirect('jobs/edit/' . $project);
		}
	}

	public function edit() {
		$this->authorize();
		$this->load->model('Workmodel');

		$id = $this->uri->segment(3);

		if($_POST) {
			$project = $this->input->post('id');
			$task = $this->sanitize->trimFirstCaps($this->input->post('task'));
			$crew = $this->input->post('crew');
			$notes = $this->input->post('notes');
			$start = $this->input->post('start');
			$end = $this->input->post('end');

			if ($crew) {
				$crew = implode(', ', $crew);
			}

			$data = array(
				'project' => $project,
				'task' => $task,
				'crew' => $crew,
				'notes' => $notes,
				'start' => $start,
				'end' => $end
			);

			$this->Workmodel->update($data, $id);

			$this->session->set_flashdata('updatedtask', $task);
			redirect('jobs/edit/' . $project);
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
