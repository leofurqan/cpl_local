<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'marketing_manager/login_model'
		));
	}

	public function index()
	{
		if (is_marketing_manager_logged_in()) {
			redirect('marketing_manager/dashboard');
		}

		$this->load->view('marketing_manager/login');
	}

	public function check_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->login_model->check_user($email, $password);
		if ($user != null) {
			$data["cpl"] = array(
				'is_marketing_manager' => true,
				'user_id' => $user->id,
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
			);
			$this->session->set_userdata($data);

			echo "success";
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('marketing_manager/login');
	}
}
