<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'admin/dashboard_model',
			'admin/tournament_model',
			'admin/matches_model'
		));
	}

	public function index()
	{
		if (!is_admin_logged_in()) {
			redirect('admin/login');
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
		$data['batsman_score'] = $this->dashboard_model->get_batsman_score()->score;
		$data['extra_runs'] = $this->dashboard_model->get_extra_score()->runs;
		$data['wickets'] = $this->dashboard_model->get_total_wickets()->wickets;
		$data['four'] = $this->dashboard_model->get_four_runs()->four;
		$data['six'] = $this->dashboard_model->get_six_runs()->six;
		$data['hundreds'] = $this->dashboard_model->get_no_of_hundreds()->num_of_hundreds;
		$data['fifties'] = $this->dashboard_model->get_no_of_fifties()->num_of_fifties;
		$data['max_score'] = $this->dashboard_model->get_max_score()->max_score;
		$data['max_wickets'] = $this->dashboard_model->get_max_wickets()->max_wickets;
		$data['view'] = $this->load->view('admin/dashboard', $data, true);
		$this->load->view('admin/template', $data);
	}
}
