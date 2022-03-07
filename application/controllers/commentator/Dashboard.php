<?php


class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'commentator/dashboard_model',
		));
	}

	public function index()
	{
		if (!is_commentator_logged_in()) {
			redirect('commentator/login');
		}


		$data['title'] = 'Dashboard';
		$data['matches'] = $this->dashboard_model->get_matches_by_commentator_id($this->session->userdata('cpl')['commentator_id']);
		$data['live_matches'] = $this->dashboard_model->get_live_matches_by_commentator_id($this->session->userdata('cpl')['commentator_id']);

		$data['view'] = $this->load->view('commentator/dashboard', $data, true);
		$this->load->view('commentator/template', $data);
	}

}
