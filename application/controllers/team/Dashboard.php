<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'team/dashboard_model',
			'team/matches_model'

		));
		if (!is_team_logged_in()) {
			redirect('team/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['player'] = $this->dashboard_model->get_player_count();
		$data['tournaments'] = $this->dashboard_model->get_live_tournaments();
		$data['matches_count'] = $this->dashboard_model->get_all_matches_count_by_team_id($this->session->userdata('cpl')['team_id'])->matches_count;
		$data['matches_result'] = $this->dashboard_model->get_match_result_count($this->session->userdata('cpl')['team_id']);
		$data['matches'] = $this->matches_model->get_list_of_live_matches_by_id($this->session->userdata('cpl')['team_id']);
		$data['view'] = $this->load->view('team/dashboard', $data, true);
		$this->load->view('team/template', $data);
	}
	public function match_details($id)
	{

		$data['title'] = 'Matches Details';
		$data['match_team'] = $this->dashboard_model->get_live_match($id);
		$data['view'] = $this->load->view('team/match_details', $data, true);
		$this->load->view('team/template', $data);
	}


// Ajax Function
	public function get_points_data()
	{
		$id = $this->input->post('tournament_id');
		$pools = $this->dashboard_model->get_current_tournament_pools($id);
		$teams = $this->dashboard_model->get_all_teams_by_pool($id);
		$points = $this->dashboard_model->get_table_point($id);
		$html = '';
		if (count($pools) == 2) {
			$col = "col-lg-6";
		} else if (count($pools) == 3) {
			$col = "col-lg-4";
		} else {
			$col = "col-lg-3";
		}
		foreach ($pools as $pool) {
			$html .= '<div class=' . $col . '>' .
				'<span class="font-weight-bold">Pool: ' . $pool->pools_name . '</span>'
				. '<table class="table table-striped table-bordered table-hover table-checkable"  id="table_tournaments">'
				. '<thead>'
				. '<tr>'
				. '<th>Teams</th>'
				. '<th>P</th>'
				. '<th>W</th>'
				. '<th>L</th>'
				. '<th>T</th>'
				. '<th>Pts</th>'
				. '<th>NRR</th>'
				. '</tr>'
				. '</thead>'
				. '<tbody>';
			foreach ($teams as $key => $team) {
					$net_run_rate = $this->dashboard_model->get_nrr($team->id,$id);
					if ($pool->id == $team->pool_id) {
						foreach ($points as $point) {
							if ($point->team == $team->id) {
								if ($point->num_wins != '0' && $point->num_ties != '0') {
									$point_cal = $point->num_wins * 2;
									$point_cal += $point->num_ties * 1;
								} else if ($point->num_wins == '0' && $point->num_ties != '0') {
									$point_cal = $point->num_ties * 1;
								} else if ($point->num_wins != '0' && $point->num_ties == '0') {
									$point_cal = $point->num_wins * 2;
								} else {
									$point_cal = '0';
								}
								$html .= '<tr>'
									. '<td>' .  substr($team->company_name, 0, 18) . '</td>'
									. '<td>' . $point->num_total . '</td>'
									. '<td>' . $point->num_wins . '</td>'
									. '<td>' . $point->num_losses . '</td>'
									. '<td>' . $point->num_ties . '</td>'
									. '<td>' . $point_cal . '</td>';
									if ($net_run_rate->nrr != null) {
										$html .= '<td>' . $net_run_rate->nrr . '</td>';
									}
									else{
										$html .= '<td>0</td>';
									}
									$html.= '</tr>';
							}
						}
					}
			}

			$html .= '</tbody>' .
				'</table>'
				. '</div>';
		}
		echo json_encode($html);
	}

	public function calculate_nrr()
	{
		$result = $this->dashboard_model->get_nrr();
		$nrr = array();
		if ($result) {
			for ($i = 0; $i < count($result); $i++) {
				if (isset($result[$i + 1])) {
					if ($result[$i]->match_result_match_id == $result[$i + 1]->match_result_match_id) {
						if ($result[$i]->total_wickets == 10) {
							$first_team = $result[$i]->total_score / 20;
						} else {
							$first_team = $result[$i]->total_score / $result[$i]->over_count;
						}
						if ($result[$i + 1]->total_wickets == 10) {
							$second_team = $result[$i + 1]->total_score / 20;
						} else {
							$second_team = $result[$i + 1]->total_score / $result[$i + 1]->over_count;
						}
						$first_team_nrr = $first_team - $second_team;
						$second_team_nrr = $second_team - $first_team;

						array_push($nrr, array("team_id" => $result[$i]->team_id, "nrr" => $first_team_nrr), array("team_id" => $result[$i + 1]->team_id, "nrr" => $second_team_nrr));
					}
				}
			}
			return $nrr;
		} else {
			return false;
		}
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
			$data['bowling_team_score'] = $this->dashboard_model->get_total_score_by_team_id($match_id, $data['match_data']->bowling_team)->score + $this->dashboard_model->get_extra_score_by_team_id($match_id, $data['match_data']->bowling_team)->extra_score;
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
