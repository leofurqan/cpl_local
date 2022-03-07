<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clubs extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/club_model'
		));
	}

	public function index()
	{
		$data['title'] = 'Club List';
		$data['clubs'] = $this->club_model->get_all_clubs();
		$data['view'] = $this->load->view('admin/clubs/list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function add_club()
	{
		$data['title'] = 'Add Club';
		if ($this->input->post('submit') === "submit") {
			$config['upload_path'] = './uploads/clubs/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('exception', 'Image did not uploaded');
			} else {
				$logo = $this->upload->data();
				$club = array(
					'club_name' => $this->input->post('club_name'),
					'owner_name' => $this->input->post('owner_name'),
					'email' => $this->input->post('email'),
					'contact' => $this->input->post('contact'),
					'address' => $this->input->post('address'),
					'logo' => $logo['file_name'],
					'url' => $this->input->post('url'),
					'status' => $this->input->post('status'),
					'description' => $this->input->post('description'),
					'created_date' => date('Y-m-d H:i:s')
				);

				if ($this->club_model->add_club($club)) {
					$this->session->set_flashdata('message', 'Added Successfully');
					redirect('admin/clubs/');
				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}

		}
		$data['view'] = $this->load->view('admin/clubs/add_club', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Club';
		$data['club'] = $this->club_model->get_club_by_id($id);
		if ($this->input->post('submit') === 'submit') {


			$config['upload_path'] = './uploads/clubs/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('logo')) {
				$logo = $data['club']->logo;
			} else {
				$img_name = $data['club']->logo;
				unlink('./uploads/clubs/' . $img_name);
				$logo = $this->upload->data()["file_name"];
			}
			$club = array(
				'club_name' => $this->input->post('club_name'),
				'owner_name' => $this->input->post('owner_name'),
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
				'url' => $this->input->post('url'),
				'logo' => $logo,
				'status' => $this->input->post('status'),
				'description' => $this->input->post('description'),
				'updated_date' => date('Y-m-d H:i:s')
			);


			if ($this->club_model->update_club($club, $id)) {
				$this->session->set_flashdata('message', 'Updated Successfully');
				redirect('admin/clubs/');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}


		$data['view'] = $this->load->view('admin/clubs/edit', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function delete($id)
	{
		if ($this->club_model->delete_club($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		redirect('admin/club');
	}

	public function change_password($id)
	{
		$data['title'] = 'Change Password';
		if ($this->input->post('submit') === 'submit') {

			$new_password = array('password' => sha1($this->input->post('new_password')));
			if ($this->club_model->change_password($new_password, $id)) {
				$this->session->set_flashdata('message', 'Password Changed Successfully');
			} else {
				$this->session->set_flashdata('exception', 'Something went wrong');
			}
		}
		$this->index();
//		$data['view'] = $this->load->view('admin/teams/change_password', $data, true);
//		$this->load->view('admin/template', $data);
	}


	/*AJAX Functions */
	function check_email()
	{
		$email = $this->input->post('email');
		$result = $this->club_model->check_email($email);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}

	function check_contact()
	{
		$contact = $this->input->post('contact');
		$result = $this->club_model->check_contact($contact);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1) {
			$data = array('status' => 0);
			$result = $this->club_model->update_club($data, $id);
			echo json_encode($result);
		} else {
			$data = array('status' => 1);
			$result = $this->club_model->update_club($data, $id);
			echo json_encode($result);
		}


	}

}
