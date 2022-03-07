<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'team/login_model'
		));
	}
	public function index()
	{
		if (is_team_logged_in()) {
			redirect('team/dashboard');
		}
		$this->load->view('team/login');
	}
	public function check_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$team = $this->login_model->check_team($email, $password);
		if ($team != null) {
			$data["cpl"] = array(
				'is_team' => true,
				'team_id' => $team->id,
				'name' => $team->company_name
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
		redirect('team/login');
	}
}
