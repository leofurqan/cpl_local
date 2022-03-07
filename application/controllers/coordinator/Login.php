<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'coordinator/login_model'
		));
	}

	public function index()
	{
		if (is_coordinator_logged_in()) {
			redirect('coordinator/dashboard');
		}
		$this->load->view('coordinator/login');
	}

	public function check_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$coordinator = $this->login_model->check_user($email, $password);
		if ($coordinator != null) {
			$data["cpl"] = array(
				'is_coordinator' => true,
				'coordinator_id' => $coordinator->id,
				'full_name' => $coordinator->full_name,

			);
			$this->session->set_userdata($data);

			echo "success";
		}
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('coordinator/login');
	}
}
