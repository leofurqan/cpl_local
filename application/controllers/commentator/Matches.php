<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matches extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_commentator_logged_in()) {
			redirect('commentator/login');
		}
		$this->load->model(array(
			'commentator/dashboard_model',
		));
	}

	public function index()
	{
		$data['title'] = 'Matches';
		$data['matches'] = $this->dashboard_model->get_matches_by_commentator_id($this->session->userdata('cpl')['commentator_id']);
		$data['view'] = $this->load->view('commentator/match', $data, true);
		$this->load->view('commentator/template', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'Match Info';
		$data['match_team'] = $this->dashboard_model->get_live_match_by_id($id);
		$data['view'] = $this->load->view('commentator/match_details', $data, true);
		$this->load->view('commentator/template', $data);
	}

	public function get_data_match()
	{
		$match_id = $this->input->post('match_id');
		$data['match_data'] = $this->dashboard_model->get_match_data($match_id);
		//bowling_team
		$bowler_over = (int)(($this->dashboard_model->get_bowler_count($match_id, $data['match_data']->bowler_id)->balls) / 6);
		$bowler_balls = $this->dashboard_model->get_bowler_count($match_id, $data['match_data']->bowler_id)->balls % 6;
		$data['bowler_balls'] = $this->dashboard_model->get_bowler_count($match_id, $data['match_data']->bowler_id)->balls;
		if ($data['match_data']->innings_no == "2") {
			$data['bowling_team_score'] = ($this->dashboard_model->get_total_score_by_team_id($match_id, $data['match_data']->bowling_team)->score) + ($this->dashboard_model->get_extra_score_by_team_id($match_id, $data['match_data']->bowling_team)->extra_score) + 1;
		}
		$data['over_count'] = $bowler_over . '.' . $bowler_balls;
		$data['bowler_wickets'] = $this->dashboard_model->get_wickets_by_bowler_id($match_id, $data['match_data']->bowler_id)->wickets;
		$data['bowler_runs'] = $this->dashboard_model->get_bowler_score($match_id, $data['match_data']->bowler_id)->runs + $this->dashboard_model->get_bowler_extra_score($match_id, $data['match_data']->bowler_id)->runs == null ? 0 : $this->dashboard_model->get_bowler_score($match_id, $data['match_data']->bowler_id)->runs + $this->dashboard_model->get_bowler_extra_score($match_id, $data['match_data']->bowler_id)->runs;
		// batting_team
		$runs = $this->dashboard_model->get_total_score_by_team_id($match_id, $data['match_data']->batting_team)->score + $this->dashboard_model->get_extra_score_by_team_id($match_id, $data['match_data']->batting_team)->extra_score;
		$data['runs'] = $runs == null ? 0: $runs;

		$data['wickets'] = $this->dashboard_model->get_wickets_by_team_id($match_id, $data['match_data']->batting_team)->wickets;
		$over = (int)(($this->dashboard_model->get_valid_balls_count($match_id, $data['match_data']->batting_team)->ball) / 6);
		$balls = $this->dashboard_model->get_valid_balls_count($match_id, $data['match_data']->batting_team)->ball % 6;
		$data['valid_balls'] = $this->dashboard_model->get_valid_balls_count($match_id, $data['match_data']->batting_team)->ball;
		$data['batting_team_balls'] = $over . '.' . $balls;

		// player_score
		$data['striker_score']=$this->dashboard_model->get_batsman_score($match_id, $data['match_data']->facing_id)->batsman_score == null ? 0 : $this->dashboard_model->get_batsman_score($match_id, $data['match_data']->facing_id)->batsman_score;

		$data['non_striker_score'] = $this->dashboard_model->get_batsman_score($match_id, $data['match_data']->non_facing_id)->batsman_score == null ? 0 :$this->dashboard_model->get_batsman_score($match_id, $data['match_data']->non_facing_id)->batsman_score;

		//player_balls
		$data['striker_balls'] = $this->dashboard_model->get_batsman_balls($match_id, $data['match_data']->facing_id);
		$data['non_striker_balls'] = $this->dashboard_model->get_batsman_balls($match_id, $data['match_data']->non_facing_id);
		// 4s & 6s
		$data['striker_4s'] = $this->dashboard_model->get_batsman_no_fours($match_id, $data['match_data']->facing_id)->fours;
		$data['non_striker_4s'] = $this->dashboard_model->get_batsman_no_fours($match_id, $data['match_data']->non_facing_id)->fours;

		$data['striker_6s'] = $this->dashboard_model->get_batsman_no_six($match_id, $data['match_data']->facing_id)->six;
		$data['non_striker_6s'] = $this->dashboard_model->get_batsman_no_six($match_id, $data['match_data']->non_facing_id)->six;
		// current bowler score
		$data['current_striker_bowler_score']=$this->dashboard_model->get_bowler_batsman_score($match_id, $data['match_data']->facing_id, $data['match_data']->bowler_id)->batsman_score ==null ? 0 :$this->dashboard_model->get_bowler_batsman_score($match_id, $data['match_data']->facing_id, $data['match_data']->bowler_id)->batsman_score;

		$data['current_non_striker_bowler_score']=$this->dashboard_model->get_bowler_batsman_score($match_id, $data['match_data']->non_facing_id, $data['match_data']->bowler_id)->batsman_score ==null ? 0 :$this->dashboard_model->get_bowler_batsman_score($match_id, $data['match_data']->non_facing_id, $data['match_data']->bowler_id)->batsman_score;

		$data['balls'] = $this->dashboard_model->get_bowler_balls_by_batsman($match_id, $data['match_data']->facing_id, $data['match_data']->bowler_id);
		$data['balls_non'] = $this->dashboard_model->get_bowler_balls_by_batsman($match_id, $data['match_data']->non_facing_id, $data['match_data']->bowler_id);


		echo json_encode($data);
	}

}
