<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work extends CI_Controller {

	public function create() {
		$this->authorize();
		$this->load->model('workModel');

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

			$this->workModel->create($data);

			$this->session->set_flashdata('addedtask', $task);
			redirect('projects/edit/' . $project);
		}
	}

	public function edit() {
		$this->authorize();
		$this->load->model('workModel');

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

			$this->workModel->update($data, $id);

			$this->session->set_flashdata('updatedtask', $task);
			redirect('projects/edit/' . $project);
		}

		$id = $this->uri->segment(3);
		$data['task'] = $this->workModel->getRecord($id);

		echo json_encode($data['task']);
	}

	public function delete() {
		$this->authorize();
		$this->load->model('workModel');

		$this->workModel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removedtask', urldecode($this->uri->segment(4)));
		redirect('projects/edit/' . $this->uri->segment(5));
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
