<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Players extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_team_logged_in()) {
			redirect('team/login');
		}

		$this->load->model(array(
			'team/player_model',

		));
	}

	public function index()
	{
		$data['title'] = 'Player List';
		$data['players'] = $this->player_model->get_player_by_team_id();
		$data['view'] = $this->load->view('team/players/list', $data, true);
		$this->load->view('team/template', $data);
	}


	public function overview($id)
	{
		$data['title'] = 'Player Profile';

		$data['player'] = $this->player_model->get_player_by_id($id);
		$data['view'] = $this->load->view('team/players/profile', $data, true);
		$this->load->view('team/template', $data);
	}

	public function batting_stats($id)
	{
		$data['title'] = 'Player Batting Stats';
		$data['player'] = $this->player_model->get_player_by_id($id);
		$data['matches_count'] = $this->player_model->get_player_matches_count_by_id($id);
		$data['total_score'] = $this->player_model->get_player_total_score_by_id($id);
		$data['overs'] = $this->player_model->get_player_overs_count_by_id($id);
		$data['tournament_count'] = $this->player_model->get_player_tournaments_count_by_id($id);
		$data['wickets'] = $this->player_model->get_wickets_by_player_id($id);
		$data['man_of_match_count'] = $this->player_model->get_man_of_match_by_player_id($id);


		$data['view'] = $this->load->view('team/players/batting_stats', $data, true);
		$this->load->view('team/template', $data);
	}
	
	public function add_player()
	{
		$data['title'] = 'Add Player';
		if ($this->input->post('submit') === "submit") {
			$config['upload_path'] = './uploads/players/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->session->set_flashdata('exception', 'Please Try Again');
			} else {
				$image = $this->upload->data();
				$player = array(
					'team_id' => $this->session->userdata('cpl')['team_id'],
					'player_name' => $this->input->post('player_name'),
					'display_name' => $this->input->post('display_name'),
					'email' => $this->input->post('email'),
					'contact' => $this->input->post('contact'),
					'image' => $image['file_name'],
					'status' => $this->input->post('status'),
					'created_date' => date('Y-m-d H:i:s')
				);
				if ($this->player_model->add_player($player)) {
					$this->session->set_flashdata('success', 'Added Successfully');

				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}
			redirect('team/players');
		}
		$data['view'] = $this->load->view('team/players/add', $data, true);
		$this->load->view('team/template', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Player';
		$data['player'] = $this->player_model->get_player_by_id($id);

		if ($this->input->post('submit') === "submit") {
			$config['upload_path'] = './uploads/players/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$image = $data['player']->image;
			} else {
				$img_name = $data['player']->image;
				unlink('./uploads/players/' . $img_name);
				$image = $this->upload->data()["file_name"];
			}
				$player = array(
					'team_id' => $this->session->userdata('cpl')['team_id'],
					'player_name' => $this->input->post('player_name'),
					'display_name' => $this->input->post('display_name'),
					'email' => $this->input->post('email'),
					'contact' => $this->input->post('contact'),
					'image' => $image,
					'status' => $this->input->post('status'),
					'created_date' => date('Y-m-d H:i:s')
				);
				if ($this->player_model->update_player($player,$id)) {
					$this->session->set_flashdata('success', 'Updated Successfully');
					redirect('team/players');
				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}


		}
		$data['view'] = $this->load->view('team/players/edit', $data, true);
		$this->load->view('team/template', $data);
	}



	public function change_password()
	{
		$data['title'] = 'Change Password';
		if ($this->input->post('submit') === 'submit') {
			$id = $this->input->post('player_id');
			$new_password = array('password' => sha1($this->input->post('new_password')));
			if ($this->player_model->change_password($new_password, $id)) {
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
		$result = $this->player_model->check_email($email);
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
		$result = $this->player_model->check_contact($contact);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}
		echo json_encode($response);
	}

	public function get_team_detail()
	{
		$id = $this->input->post('id');
		$result = $this->player_model->get_player_detail($id);
		echo json_encode($result);
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1) {
			$data = array('status' => 0);
			$result = $this->player_model->update_player($data, $id);
			echo json_encode($result);
		} else {
			$data = array('status' => 1);
			$result = $this->player_model->update_player($data, $id);
			echo json_encode($result);
		}
	}
	public function send_player_credentials($id)
	{
		$email = $this->player_model->get_player_by_id($id)->email;
		$player_name = $this->player_model->get_player_by_id($id)->player_name;
		$contact = $this->player_model->get_player_by_id($id)->contact;
		$password = generate_string();
		$data['title'] = 'Player Credentials';
		$player_password = array('password' => sha1($password));
		if ($this->player_model->update_player($player_password, $id)) {
			$this->load->library('phpmailer_library');
			$mail = $this->phpmailer_library->load();
			$mail->isSMTP();
			$mail->Host = 's26.hosterpk.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'marketing@cpl.net.pk';
			$mail->Password = 'lahore@786';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->setFrom('marketing@cpl.net.pk', 'CPS Club');
			$mail->addBcc('marketing@cpl.net.pk');
			// Email subject
			$mail->Subject = 'Login Credentials';

			// Set email format to HTML
			$mail->isHTML(true);

			// Add a recipient
			$mail->addAddress($email);
			$mail->Body = 'Dear ' . $player_name . ',<br>Your player portal login details as under <br>Email: ' . $email . ' <br>Password: ' . $password . '<br>Your player app login details as under <br>Phone No: ' . $contact . ' <br>Password: ' . $password . '<br><a href="https://cpl.net.pk/player/login">https://cpl.net.pk/player/login</a><br>Download Android application from the following button<br><a href="https://play.google.com/store/apps/details?id=atech.solutions.cplteam"><img src="' . base_url('assets/media/cpl/app_download.png') . '"/></a>'.'<br><img width="25%" src="' . base_url('assets/media/cpl/signature.jpeg') . '"/>';

			// Send email
			if (!$mail->send()) {
				$this->session->set_flashdata('exception', 'Something went wrong...');
			} else {
				$this->session->set_flashdata('message', 'Login Credentials sent successfully');
			}
		} else {
			$this->session->set_flashdata('exception', 'Something went wrong...');
		}

		redirect('team/players');
	}

}

