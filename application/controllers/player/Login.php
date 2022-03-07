<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'player/login_model'
		));
	}

	public function index()
	{
		if (is_player_logged_in()) {
			redirect('player/dashboard');
		}

		$this->load->view('player/login');
	}

	public function check_login()
	{
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));

		$player = $this->login_model->check_player($email, $password);
		if ($player != null) {
			$data["cpl"] = array(
				'is_player' => true,
				'player_id' => $player->id,
				'name' => $player->player_name
			);
			$this->session->set_userdata($data);
			echo "success";
		} else {
			echo "failed";
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('player/login');
	}
}
