<?php


class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'commentator/login_model'
		));
	}

	public function index()
	{
		if (is_commentator_logged_in()) {
			redirect('commentator/dashboard');
		}
		$this->load->view('commentator/login');
	}

	public function check_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');


		$commentator = $this->login_model->check_user($email, $password);
		if ($commentator != null) {
			$data["cpl"] = array(
				'is_commentator' => true,
				'commentator_id' => $commentator->id,
				'full_name' => $commentator->full_name,
			);

			$this->session->set_userdata($data);

			echo "success";
		}
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('commentator/login');
	}
}
