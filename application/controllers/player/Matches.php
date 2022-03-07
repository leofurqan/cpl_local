<?php


class Matches extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'player/matches_model',

		));
		if(!is_player_logged_in()) {
			redirect('player/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Matches';
		$data['matches'] = $this->matches_model->get_all_matches($this->session->userdata('cpl')['player_id']);
		$data['view'] = $this->load->view('player/matches/list', $data, true);
		$this->load->view('player/template', $data);
	}

	public function view_matches($page,$id)
	{
		$data['title'] = 'View Matches';
		$data['page'] = $page;
		$data['match_id'] = $id;
		$data['match'] = $this->matches_model->get_match_by_id($id);
		if ($page == 'match_stats'){
			$data['match_team'] = $this->matches_model->get_live_match($id);
		}
		$data['view'] = $this->load->view('player/matches/view/tab_index', $data, true);
		$this->load->view('player/template', $data);
	}

	public function get_data_match()
	{
		$match_id = $this->input->post('match_id');
		$data['match_data'] = $this->matches_model->get_match_data($match_id);
		//bowling_team
		$bowler_over = (int)(($this->matches_model->get_bowler_count($match_id, $data['match_data']->bowler_id)->balls) / 6);
		$bowler_balls = $this->matches_model->get_bowler_count($match_id, $data['match_data']->bowler_id)->balls % 6;
		$data['bowler_balls'] = $this->matches_model->get_bowler_count($match_id, $data['match_data']->bowler_id)->balls;
		if ($data['match_data']->innings_no == "2") {
			$data['bowling_team_score'] = $this->matches_model->get_total_score_by_team_id($match_id, $data['match_data']->bowling_team)->score + $this->matches_model->get_extra_score_by_team_id($match_id, $data['match_data']->bowling_team)->extra_score;
		}
		$data['over_count'] = $bowler_over . '.' . $bowler_balls;
		$data['bowler_wickets'] = $this->matches_model->get_wickets_by_bowler_id($match_id, $data['match_data']->bowler_id)->wickets;
		$data['bowler_runs'] = $this->matches_model->get_bowler_score($match_id, $data['match_data']->bowler_id)->runs + $this->matches_model->get_bowler_extra_score($match_id, $data['match_data']->bowler_id)->runs == null ? 0 : $this->matches_model->get_bowler_score($match_id, $data['match_data']->bowler_id)->runs + $this->matches_model->get_bowler_extra_score($match_id, $data['match_data']->bowler_id)->runs;
		// batting_team
		$runs = $this->matches_model->get_total_score_by_team_id($match_id, $data['match_data']->batting_team)->score + $this->matches_model->get_extra_score_by_team_id($match_id, $data['match_data']->batting_team)->extra_score;
		$data['runs'] = $runs == null ? 0: $runs;

		$data['wickets'] = $this->matches_model->get_wickets_by_team_id($match_id, $data['match_data']->batting_team)->wickets;
		$over = (int)(($this->matches_model->get_valid_balls_count($match_id, $data['match_data']->batting_team)->ball) / 6);
		$balls = $this->matches_model->get_valid_balls_count($match_id, $data['match_data']->batting_team)->ball % 6;
		$data['valid_balls'] = $this->matches_model->get_valid_balls_count($match_id, $data['match_data']->batting_team)->ball;
		$data['batting_team_balls'] = $over . '.' . $balls;

		// player_score
		$data['striker_score']=$this->matches_model->get_batsman_score($match_id, $data['match_data']->facing_id)->batsman_score == null ? 0 : $this->matches_model->get_batsman_score($match_id, $data['match_data']->facing_id)->batsman_score;

		$data['non_striker_score'] = $this->matches_model->get_batsman_score($match_id, $data['match_data']->non_facing_id)->batsman_score == null ? 0 :$this->matches_model->get_batsman_score($match_id, $data['match_data']->non_facing_id)->batsman_score;

		//player_balls
		$data['striker_balls'] = $this->matches_model->get_batsman_balls($match_id, $data['match_data']->facing_id);
		$data['non_striker_balls'] = $this->matches_model->get_batsman_balls($match_id, $data['match_data']->non_facing_id);
		// 4s & 6s
		$data['striker_4s'] = $this->matches_model->get_batsman_no_fours($match_id, $data['match_data']->facing_id)->fours;
		$data['non_striker_4s'] = $this->matches_model->get_batsman_no_fours($match_id, $data['match_data']->non_facing_id)->fours;

		$data['striker_6s'] = $this->matches_model->get_batsman_no_six($match_id, $data['match_data']->facing_id)->six;
		$data['non_striker_6s'] = $this->matches_model->get_batsman_no_six($match_id, $data['match_data']->non_facing_id)->six;
		// current bowler score
		$data['current_striker_bowler_score']=$this->matches_model->get_bowler_batsman_score($match_id, $data['match_data']->facing_id, $data['match_data']->bowler_id)->batsman_score ==null ? 0 :$this->matches_model->get_bowler_batsman_score($match_id, $data['match_data']->facing_id, $data['match_data']->bowler_id)->batsman_score;

		$data['current_non_striker_bowler_score']=$this->matches_model->get_bowler_batsman_score($match_id, $data['match_data']->non_facing_id, $data['match_data']->bowler_id)->batsman_score ==null ? 0 :$this->matches_model->get_bowler_batsman_score($match_id, $data['match_data']->non_facing_id, $data['match_data']->bowler_id)->batsman_score;

		$data['balls'] = $this->matches_model->get_bowler_balls_by_batsman($match_id, $data['match_data']->facing_id, $data['match_data']->bowler_id);
		$data['balls_non'] = $this->matches_model->get_bowler_balls_by_batsman($match_id, $data['match_data']->non_facing_id, $data['match_data']->bowler_id);


		echo json_encode($data);
	}
}
