<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'Coordinator/dashboard_model',
			'admin/tournament_model',
			'admin/matches_model'

		));
	}

	public function index()
	{
		if (!is_coordinator_logged_in()) {
			redirect('coordinator/login');
		}

		$data['title'] = 'Dashboard';
		$data['team'] = $this->dashboard_model->get_team_count();
		$data['ground'] = $this->dashboard_model->get_ground_count();
		$data['official'] = $this->dashboard_model->get_official_count();
		$data['tournament'] = $this->dashboard_model->get_tournament_count();
		$data['live_tournaments'] = $this->dashboard_model->get_live_tournament_count();
		$data['player'] = $this->dashboard_model->get_player_count();
		$data['matches_count'] = $this->dashboard_model->get_matches_count();
		$data['live_matches'] = $this->dashboard_model->get_live_matches_count();
		$data['tournaments'] = $this->tournament_model->get_all_live_tournaments();
		$data['matches'] = $this->matches_model->get_all_live_matches();

		$data['view'] = $this->load->view('coordinator/dashboard', $data, true);
		$this->load->view('coordinator/template', $data);
	}
}
