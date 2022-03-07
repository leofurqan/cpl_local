<?php defined('BASEPATH') or exit('No direct script access allowed');


class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_player_logged_in()) {
			redirect('player/login');
		}

		$this->load->model(array(
			'player/login_model',
			'player/player_model'

		));
	}

	public function index()
	{

		$data['title'] = 'Player Profile';
		if ($this->input->post('submit') === 'submit') {
			if ($this->input->post('image') !== null) {
				$config['upload_path'] = './uploads/players/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;
				$config['max_width'] = 0;
				$config['max_height'] = 0;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image')) {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
				$image = $this->upload->data();
			}
			$player = array(
				'player_name' => $this->input->post('player_name'),
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password')),
				'contact' => $this->input->post('contact'),
				'cnic' => $this->input->post('cnic'),
				'playing_status' => $this->input->post('playing_status'),
				'batting_style' => $this->input->post('batting_style'),
				'bowling_style' => $this->input->post('bowling_style'),
				'kit_size' => $this->input->post('kit_size'),
				'status' => $this->input->post('status'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->input->post('image') !== null) {
				$team['image'] = $image['file_name'];
			}

			if ($this->login_model->update_player($player)) {
				$this->session->set_flashdata('message', 'Updated Successfully');
			} else {

				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}
		$data['playing_statuses'] = $this->player_model->get_all_playing_status();
		$data['batting_styles'] = $this->player_model->get_all_batting_style();
		$data['bowling_styles'] = $this->player_model->get_all_bowling_style();
		$data['kit_sizes'] = $this->player_model->get_all_kit_size();
		$data['player'] = $this->login_model->get_player_by_id();
		$data['view'] = $this->load->view('player/profile', $data, true);
		$this->load->view('player/template', $data);
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
		$data['player'] = $this->login_model->get_player_by_id();
		$data['view'] = $this->load->view('player/change_password', $data, true);
		$this->load->view('player/template', $data);
	}

	function check_email()
	{
		$email = $this->input->post('email');
		$result = $this->player_model->check_email($email);
		if ($result->num_rows() > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}
	function check_contact()
	{
		$contact = $this->input->post('contact');
		$result = $this->player_model->check_contact($contact);
		if ($result->num_rows() > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}

	function check_cnic()
	{
		$cnic = $this->input->post('cnic');
		$result = $this->player_model->check_cnic($cnic);
		if ($result->num_rows() > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}

}
