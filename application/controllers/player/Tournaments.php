<?php


class Tournaments extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'player/tournament_model',

		));
		if(!is_player_logged_in()) {
			redirect('player/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Tournaments';
		$data['tournaments'] = $this->tournament_model->get_all_tournaments($this->session->userdata('cpl')['player_id']);
		$data['view'] = $this->load->view('player/tournaments/list', $data, true);
		$this->load->view('player/template', $data);
	}

	public function view_tournament($page,$id)
	{
		$data['title'] = 'View Tournament';
		$data['page'] = $page;
		$data['tournament_id'] = $id;
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($id);
		if ($page == 'home'){
			$data['batsman_score'] = $this->tournament_model->get_batsman_score_by_tournament_id($id);
			$data['extra_runs'] = $this->tournament_model->get_extra_runs_tournament_id($id);
			$data['wickets'] = $this->tournament_model->get_wickets_by_tournament_id($id);
			$data['fours'] = $this->tournament_model->get_four_runs_tournament_id($id);
			$data['six'] = $this->tournament_model->get_six_runs_tournament_id($id);
			$data['hundreds'] = $this->tournament_model->get_no_of_hundreds_by_tournament_id($id)->num_of_hundreds;
			$data['fifties'] = $this->tournament_model->get_no_of_fifties_by_tournament_id($id)->num_of_fifties;
			$data['max_score'] = $this->tournament_model->get_max_score_by_tournament_id($id)->max_score;
			$data['max_wickets'] = $this->tournament_model->get_max_wickets_by_tournament_id($id)->max_wickets;
		}
		$data['view'] = $this->load->view('player/tournaments/view/tab_index', $data, true);
		$this->load->view('player/template', $data);
	}
}
