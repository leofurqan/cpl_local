<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tournaments extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_team_logged_in()) {
			redirect('team/login');

		}
		$this->load->model(array(
			'team/tournament_model'
		));
	}

	public function index()
	{
		$data['title'] = 'Tournaments';
		$data['tournaments'] = $this->tournament_model->get_tournaments_list();
		$data['view'] = $this->load->view('team/tournament_list', $data, true);
		$this->load->view('team/template', $data);
	}
}



