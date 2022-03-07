<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'player/dashboard_model',
			'player/tournament_model',
			'player/matches_model',

		));
		if(!is_player_logged_in()) {
			redirect('player/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Player Statistics';
		$data['player'] = $this->dashboard_model->get_player_by_id();
		$data['matches_count'] = $this->dashboard_model->get_match_count();
		$data['player_score'] = $this->dashboard_model->get_player_total_score($this->session->userdata('cpl')['player_id']);
		$data['balls'] = $this->dashboard_model->get_bowler_count($this->session->userdata('cpl')['player_id']);
		$data['man_of_match_count'] = $this->dashboard_model->get_man_of_match_count($this->session->userdata('cpl')['player_id'])->man_of_match_count;
		$data['fifties'] = $this->dashboard_model->get_no_of_fifties_by_player_id($this->session->userdata('cpl')['player_id'])->num_of_fifties;
		$data['hundreds'] = $this->dashboard_model->get_no_of_hundreds_by_player_id($this->session->userdata('cpl')['player_id'])->num_of_hundreds;
		$data['four'] = $this->dashboard_model->get_four_runs_by_player_id($this->session->userdata('cpl')['player_id'])->four;
		$data['six'] = $this->dashboard_model->get_six_runs_by_player_id($this->session->userdata('cpl')['player_id'])->six;
		$bowler_over = (int)($data['balls']/ 6);
		$bowler_balls = $data['balls'] % 6;
		$data['over_count'] = $bowler_over . '.' . $bowler_balls;
		$data['wickets'] = $this->dashboard_model->get_wickets_by_bowler_id($this->session->userdata('cpl')['player_id']);
		$data['tournaments'] = $this->tournament_model->get_all_live_tournaments($this->session->userdata('cpl')['player_id']);
		$data['matches'] = $this->matches_model->get_all_live_matches($this->session->userdata('cpl')['player_id']);
		$data['view'] = $this->load->view('player/dashboard', $data, true);
		$this->load->view('player/template', $data);
	}
}
