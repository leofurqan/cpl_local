<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_team_logged_in()) {
			redirect('team/login');
		}

		$this->load->model(array(
			'team/login_model'

		));
	}

	public function index()
	{

		$data['title'] = 'Team Profile';
		if ($this->input->post('submit') === 'submit') {
			if ($this->input->post('logo') !== null) {
				$config['upload_path'] = './uploads/teams/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;
				$config['max_width'] = 0;
				$config['max_height'] = 0;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('logo')) {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
				$logo = $this->upload->data();
			}
				$team = array(
					'company_name' => $this->input->post('company_name'),
					'email' => $this->input->post('email'),
					'password' => sha1($this->input->post('password')),
					'contact' => $this->input->post('contact'),
					'address' => $this->input->post('address'),
					'description' => $this->input->post('description'),
					'facebook' => $this->input->post('facebook'),
					'twitter' => $this->input->post('twitter'),
					'status' => $this->input->post('status'),
					'updated_date' => date('Y-m-d H:i:s')
				);

			if ($this->input->post('logo') !== null) {
				$team['logo'] = $logo['file_name'];
			}

				if ($this->login_model->update_team($team)) {
					$this->session->set_flashdata('message', 'Updated Successfully');
				} else {

					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}
		$data['team'] = $this->login_model->get_team_by_id();
		$data['view'] = $this->load->view('team/team_profile', $data, true);
		$this->load->view('team/template', $data);
	}

	public function change_password()
	{
		$data['title'] = 'Change Password';
		if ($this->input->post('submit') === 'submit') {
			$current_password = $this->input->post('current_password');
			$check_password = $this->login_model->check_password($current_password);
			if ($check_password !== null) {
				$new_password = array('password' => sha1($this->input->post('new_password')));
				if ($this->login_model->change_password($new_password)) {
					$this->session->set_flashdata('message', 'Password Changed Successfully');
				} else {
					$this->session->set_flashdata('exception', 'Something went wrong');
				}
			} else {
				$this->session->set_flashdata('exception', 'Current Password is incorrect');
			}
		}
		$data["team"] = $this->login_model->get_team_by_id();
		$data['view'] = $this->load->view('team/change_password', $data, true);
		$this->load->view('team/template', $data);
	}

	/*AJAX Functions */
	function check_email()
	{
		$email = $this->input->post('email');
		$result = $this->login_model->check_email($email);
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
		$result = $this->login_model->check_contact($contact);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}
		echo json_encode($response);
	}

}
