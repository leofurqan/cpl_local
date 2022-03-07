<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Players extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'api/cpl_team/player_model'
		));
	}

	public function players_get()
	{
		$team_id = $this->input->get("team_id");
		if (!empty($team_id)) {
			$players = $this->player_model->getAllPlayersByTeamID($team_id);
			$this->response(array(
				'status' => TRUE,
				'players' => $players
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function add_player_post()
	{
		$team_id = $this->input->post('team_id');
		$image = $this->input->post('image');
		$image = str_replace('data:image/png;base64,', '', $image);
		$image = str_replace(' ', '+', $image);
		$name = $this->input->post('name');
		$display_name = $this->input->post('display_name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');

		if (!empty($team_id) && !empty($image) && !empty($name) && !empty($email) && !empty($phone)) {
			$check_email = $this->player_model->getPlayerByEmail($email);
			if (!($check_email->num_rows() > 0)) {
				$check_phone = $this->player_model->getPlayerByPhone($phone);
				if (!($check_phone->num_rows() > 0)) {
					$image_name = $name . '_' . date('Y-m-d') . '_' . date('H:i:s') . '.png';
					$password = generate_string();
					$data = array(
						'team_id' => $team_id,
						'player_name' => $name,
						'display_name' => $display_name,
						'email' => $email,
						'password' => sha1($password),
						'contact' => $phone,
						'playing_status' => 0,
						'batting_style' => 0,
						'bowling_style' => 0,
						'image' => $image_name,
						'status' => 1,
						'is_verified' => 0,
						'created_date' => date('Y-m-d H:i:s')
					);

					$player = $this->player_model->insertPlayer($data);
					if ($player) {
						file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/players/' . $image_name, base64_decode($image));

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

						// Email subject
						$mail->Subject = 'Tournament Invitation';

						// Set email format to HTML
						$mail->isHTML(true);
						$mail->addAddress($email);
						$mail->Body = 'Login Credentials' . '<br>' . 'Phone: ' . $phone . '<br>' . 'Password: ' . $password;
						$mail->send();

						$this->response(array(
							'status' => TRUE,
						), 200);
					} else {
						$this->response(array(
							'status' => FALSE,
							'message' => 'Something went wrong',
						), 404);
					}
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Phone already exist',
					), 200);
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Email already exist',
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function edit_profile_post()
	{
		$player_id = $this->input->get('player_id');

		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$display_name = $this->input->post('display_name');
		$player_status = $this->input->post('status');

		if (!empty($player_id) && !empty($name) && !empty($email) && !empty($phone) && !empty($display_name)) {

			$player = $this->player_model->getPlayerById($player_id);

			$is_verified = 0;
			if ($player->contact == $phone) {
				$is_verified = $player->is_verified;
			}

			$data = array(
				'player_name' => $name,
				'display_name' => $display_name,
				'email' => $email,
				'contact' => $phone,
				'status' => $player_status,
				'is_verified' => $is_verified
			);

			if ($this->player_model->edit_player($player_id, $data)) {
				$this->response(array(
					'status' => true,
					'message' => 'Player Updated Successfully',
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Something went wrong',
				), 200);
			}

		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function get_player_by_id_get()
	{
		$player_id = $this->input->get('player_id');

		if (!empty($player_id)) {
			$data = $this->player_model->getPlayerById($player_id);
			if ($data) {
				$this->response(array(
					'status' => TRUE,
					'player' => $data
				), 200);
			} else {
				$this->response(array(
					'status' => false,
					'message' => 'Something went wrong'
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function players_by_status_get()
	{
		$team_id = $this->input->get("team_id");
		if (!empty($team_id)) {
			$players = $this->player_model->getActivePlayersByTeamID($team_id);
			$this->response(array(
				'status' => TRUE,
				'players' => $players
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}
}
