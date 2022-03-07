<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'admin/login_model'
		));
	}

	public function index()
	{
		if (is_admin_logged_in()) {
			redirect('admin/dashboard');
		}
		$this->load->view('admin/login');
	}

	public function check_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->login_model->check_user($email, $password);
		if ($user != null) {
			$data["cpl"] = array(
				'is_admin' => true,
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
		redirect('admin/login');
	}
}
