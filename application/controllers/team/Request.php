<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_team_logged_in()) {
			redirect('team/login');
		}

		$this->load->model(array(
			'team/request_model'
		));
	}

	public function index()
	{

	}
	public function request()
	{
		$data['title'] = 'Request';
		if($this->input->post('submit') == "submit") {
			$request = array(
				'team_id' => $this->session->userdata('cpl')['team_id'],
				'message' => $this->input->post('message'),
				'subject' => $this->input->post('subject'),
				'created_date' => date('Y-m-d H:i:s')
			);
			if ($this->request_model->send_request($request)) {
				$this->session->set_flashdata('message', 'Your Request Sent Successfully');
				redirect('team/dashboard/');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}


		}
		$data['view'] = $this->load->view('team/request', $data, true);
		$this->load->view('team/template', $data);
	}

}

