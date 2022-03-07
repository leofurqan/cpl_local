<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'marketing_manager/dashboard_model'
		));
	}

	public function index()
	{
		if (!is_marketing_manager_logged_in()) {
			redirect('marketing_manager/login');
		}

		$data['title'] = 'Dashboard';
		$data['match_summary'] = $this->dashboard_model->get_match_summary_count();
		$data['view'] = $this->load->view('marketing_manager/dashboard', $data, true);
		$this->load->view('marketing_manager/template', $data);
	}
}
