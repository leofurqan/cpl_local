<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Authentication extends RestController
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'api/cpl_team/authentication_model'
		));
	}

	public function login_post()
	{
		$phone = $this->input->post('phone');
		$password = sha1($this->input->post('password'));
		$token = $this->input->post('fcm_token');

		if (!empty($phone) && !empty($password)) {
			$team = $this->authentication_model->getTeam($phone, $password);
			if ($team->num_rows() === 1) {
				if (!empty($token)) {
					$this->authentication_model->updateFCMByTeamID($team->row()->id, $token);
				}
				$data['team'] = $team->row();
				$player = $this->authentication_model->getPlayer($phone, $password);
				if ($player->num_rows() === 1) {
					if (!empty($token)) {
						$this->authentication_model->updateFCMByPlayerID($player->row()->id, $token);
					}
					$data['player'] = $player->row();

					$type = 'team_player';
					$this->response(array(
						'status' => TRUE,
						'user_type' => $type,
						'data' => $data
					), 200);
				} else {
					$type = 'team';
					$this->response(array(
						'status' => TRUE,
						'user_type' => $type,
						'data' => $data
					), 200);
				}
			} else {
				$player = $this->authentication_model->getPlayer($phone, $password);

				if ($player->num_rows() === 1) {
					if (!empty($token)) {
						$this->authentication_model->updateFCMByPlayerID($player->row()->id, $token);
					}

					$data['player'] = $player->row();

					$type = 'player';
					$this->response(array(
						'status' => TRUE,
						'user_type' => $type,
						'data' => $data
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Phone or Password is incorrect',
					), 200);
				}
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Phone or Password not provided',
			), 404);
		}
	}

	public function change_password_post()
	{
		$user_id = $this->input->get('user_id');
		$user_type = $this->input->get('user_type');
		$c_password = $this->input->post('c_password');
		$n_password = $this->input->post('n_password');

		if (!empty($user_type) && !empty($user_id) && !empty($c_password) && !empty($n_password)) {
			if ($user_type === "team") {
				$user = $this->authentication_model->update_team_password($user_id, $c_password, $n_password);
			} else if ($user_type === "player") {
				$user = $this->authentication_model->update_player_password($user_id, $c_password, $n_password);
			}

			if ($user) {
				$this->response(array(
					'status' => TRUE,
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
				'message' => 'Some data is missing',
			), 404);
		}
	}

	public function edit_profile_post()
	{
		$user_id = $this->input->post('user_id');
		$password = $this->input->post('password');
		$playing_status = $this->input->post('playing_status');
		$batting_style = $this->input->post('batting_style');
		$bowling_style = $this->input->post('bowling_style');

		if (!empty($user_id) && !empty($password)) {
			$user = $this->authentication_model->check_player_by_password($user_id, $password);
			if ($user->num_rows() > 0) {
				$data = array(
					'playing_status' => $playing_status,
					'batting_style' => $batting_style,
					'bowling_style' => $bowling_style
				);

				$image = $this->input->post('image');
				if (!empty($image)) {
					$image = str_replace('data:image/png;base64,', '', $image);
					$image = str_replace(' ', '+', $image);
					$image_name = $user->row()->player_name . '_' . date('Y-m-d') . '_' . date('H:i:s') . '.png';
					$data['image'] = $image_name;
					file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/uploads/players/' . $image_name, base64_decode($image));

					if (file_exists($user->row()->image)) {
						unlink($_SERVER['DOCUMENT_ROOT'] . '/uploads/players/' . $user->row()->image);
					}
				}

				if ($this->authentication_model->update_player_by_id($data, $user_id)) {
					$u = $this->authentication_model->get_player_by_id($user_id);
					$this->response(array(
						'status' => TRUE,
						'message' => 'Updated Successfully',
						'data' => $u,
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
					'message' => 'Password incorrect',
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Some data is missing',
			), 404);
		}
	}

	public function send_code_get()
	{
		$user_id = $this->input->get('user_id');
		$role = $this->input->get('user_role');

		if (!empty($user_id) && !empty($role)) {
			if ($role == 'player') {
				$phone_number = $this->authentication_model->get_player_by_id($user_id)->contact;
			} else {
				$phone_number = $this->authentication_model->get_team_by_id($user_id)->contact;
			}

			$code = mt_rand(1000, 9999);
			if (sendSMS($phone_number, 'Your%20OTP%20for%20CPS%20is:%20' . $code)) {
				$verification = array(
					'user_id' => $user_id,
					'verification_code' => $code,
					'user_role' => $role,
					'created_date' => date('Y-m-d H:i:s')
				);
				if ($this->authentication_model->send_verification_code($verification)) {
					$this->response(array(
						'status' => true,
						'message' => 'Message has been sent',
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

	public function user_verification_post()
	{
		$user_id = $this->input->get('user_id');
		$role = $this->input->get('user_role');
		$code = $this->input->post('code');
		if (!empty($user_id) && !empty($role) && !empty($code)) {
			$user_verification = $this->authentication_model->get_verification_by_user_id($user_id, $role, $code);

			if ($user_verification->num_rows() > 0) {
				if ($role == 'player') {
					$this->authentication_model->verify_player($user_id);
					$this->response(array(
						'status' => TRUE,
						'message' => 'Player verified successfully',
					), 200);
				} else {
					$this->authentication_model->verify_team($user_id);
					$this->response(array(
						'status' => TRUE,
						'message' => 'Team verified successfully',
					), 200);
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid Code',
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}
}
