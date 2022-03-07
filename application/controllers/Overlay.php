<?php


class Overlay extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'overlay_model'
		));
	}

	public function index($id)
	{
		$data['match_id'] = $id;
		$this->load->view('main', $data);
	}

	public function get_data()
	{
		$match_id = $this->input->post('match_id');
		if (!empty($match_id)) {
			$data['status'] = true;
			$data['live_match'] = $this->overlay_model->get_live_match($match_id);
			if ($data['live_match']) {
				$data['innings_data'] = $this->overlay_model->get_data_from_innings($match_id);
				$data['innings'] = $this->overlay_model->get_innings_by_match_id($match_id);
				if ($data['innings']->status == 0) {
					$data['match_data'] = $this->overlay_model->get_live_match($match_id);
					$data['first_team'] = $this->overlay_model->get_team($data['match_data']->first_team_id);
					$data['second_team'] = $this->overlay_model->get_team($data['match_data']->second_team_id);
					$data['first_team_players'] = $this->overlay_model->get_team_players_by_id($match_id, $data['match_data']->first_team_id);
					$data['second_team_players'] = $this->overlay_model->get_team_players_by_id($match_id, $data['match_data']->second_team_id);
				} else {
					if ($data['innings_data']->innings_no == "2") {
						$data['bowling_team_score'] = ($this->overlay_model->get_total_score_by_team_id($match_id, $data['innings_data']->bowling_team)->score) + ($this->overlay_model->get_extra_score_by_team_id($match_id, $data['innings_data']->bowling_team)->extra_score) + 1;
					}
					$data['batting_team'] = $this->overlay_model->get_team($data['innings_data']->batting_team);
					//$data['batting_team_balls'] = $this->overlay_model->get_valid_balls_count($match_id, $data['innings_data']->batting_team)->ball % 6;
					$data['first_team'] = $this->overlay_model->get_team($data['innings_data']->batting_team);
					$data['second_team'] = $this->overlay_model->get_team($data['innings_data']->bowling_team);
					$runs = ($this->overlay_model->get_total_score_by_team_id($match_id, $data['innings_data']->batting_team)->score) + ($this->overlay_model->get_extra_score_by_team_id($match_id, $data['innings_data']->batting_team)->extra_score);
					$data['runs'] = $runs;
					$data['wickets'] = $this->overlay_model->get_wickets_by_team_id($match_id, $data['innings_data']->batting_team)->wickets;
					$over = (int)(($this->overlay_model->get_valid_balls_count($match_id, $data['innings_data']->batting_team)->ball) / 6);
					$balls = $this->overlay_model->get_valid_balls_count($match_id, $data['innings_data']->batting_team)->ball % 6;
					$data['valid_balls'] = $this->overlay_model->get_valid_balls_count($match_id, $data['innings_data']->batting_team)->ball;
					$data['batting_team_balls'] = $over . '.' . $balls;

					$bowler_over = (int)(($this->overlay_model->get_bowler_count($match_id, $data['innings_data']->bowler_id)->balls) / 6);
					$bowler_balls = $this->overlay_model->get_bowler_count($match_id, $data['innings_data']->bowler_id)->balls % 6;
					$data['bowler_balls'] = $this->overlay_model->get_bowler_count($match_id, $data['innings_data']->bowler_id);
					$data['over_count'] = $bowler_over . '.' . $bowler_balls;

					$data['striker_score'] = $this->overlay_model->get_batsman_score($match_id, $data['innings_data']->facing_id)->batsman_score == null ? 0 : $this->overlay_model->get_batsman_score($match_id, $data['innings_data']->facing_id)->batsman_score;
					$data['non_striker_score'] = $this->overlay_model->get_batsman_score($match_id, $data['innings_data']->non_facing_id)->batsman_score == null ? 0 : $this->overlay_model->get_batsman_score($match_id, $data['innings_data']->non_facing_id)->batsman_score;
					//player_balls
					$data['striker_balls'] = $this->overlay_model->get_batsman_balls($match_id, $data['innings_data']->facing_id);
					$data['non_striker_balls'] = $this->overlay_model->get_batsman_balls($match_id, $data['innings_data']->non_facing_id);
					$data['last_wicket'] = $this->overlay_model->get_last_wicket($match_id, $data['innings_data']->innings_no) == null ? 0 : $this->overlay_model->get_last_wicket($match_id, $data['innings_data']->innings_no)->player_id;

					// bowler score
					$data['bowler_score'] = $this->overlay_model->get_bowler_score($match_id, $data['innings_data']->bowler_id)->runs + $this->overlay_model->get_bowler_extra_score($match_id, $data['innings_data']->bowler_id)->runs == null ? 0 : $this->overlay_model->get_bowler_score($match_id, $data['innings_data']->bowler_id)->runs + $this->overlay_model->get_bowler_extra_score($match_id, $data['innings_data']->bowler_id)->runs;

					$last_over = $this->overlay_model->get_last_over_id($match_id, $data['innings_data']->innings_no, $data['innings_data']->bowler_id);

					if ($last_over) {

						$ball = $this->overlay_model->get_current_over_by_ball($match_id, $data['innings_data']->innings_no, $last_over->over_id);


						$ball_image = base_url('assets/media/bg/cricket-ball.png');
						$html = '';

						if ($last_over && $ball) {
							foreach ($ball as $value) {
								$wicket = $this->overlay_model->get_wicket_by_over($value->match_id, $value->innings_no, $value->over_id, $value->ball_id);
								$extra = $this->overlay_model->get_extra_by_over($value->match_id, $value->innings_no, $value->over_id, $value->ball_id);
								$batsman_score = $this->overlay_model->get_batsman_score_by_over($value->match_id, $value->innings_no, $value->over_id, $value->ball_id);
								if ($wicket) {
									$html .= '<div class="col-sm-1">
									<div id="container" style="width: 10px;height: 10px; position: relative ">
									<div id="navi" style="color: white; width: 100%;height: 100%; position: absolute; top: 0; left: 10px;z-index: 100;">W</div>
									<div id="infoi" style="width: 100%;height: 100%; position: absolute; top: 0; left: 0;">
									<img src="' . $ball_image . '" height="36" width="36" />
									</div>
									</div>
									</div>';
								} else if ($extra && $extra->extra_runs) {
									$extra_name = '';
									if ($extra->extra_type_id == 1) {
										$extra_name = 'LB';
									}
									if ($extra->extra_type_id == 2) {
										$extra_name = 'B';
									}
									if ($extra->extra_type_id == 3) {
										$extra_name = 'WB';
									}
									if ($extra->extra_type_id == 4 && $extra->count >= 1) {
										$extra_name = 'NB';
									}
									$html .= '<div class="col-sm-1">
									<div id="container" style="width: 10px;height: 10px; position: relative ">
									<div id="navi" style="color: white; width: 100%;height: 100%; position: absolute; top: 0; left: 10px;z-index: 100;">
									<div>' . $extra_name . '</div>
									<div>' . $extra->extra_runs . '</div>
									</div>
									<div id="infoi" style="width: 100%;height: 100%; position: absolute; top: 0; left: 0;">
									<img src="' . $ball_image . '" height="36" width="36" />
									</div>
									</div>
									</div>';
								} else if ($batsman_score) {
									$html .= '<div class="col-sm-1">
									<div id="container" style="width: 10px;height: 10px; position: relative ">
									<div id="navi" style="color: white; width: 100%;height: 100%; position: absolute; top: 0; left: 10px;z-index: 100;">' . $batsman_score->runs_scored . '</div>
									<div id="infoi" style="width: 100%;height: 100%; position: absolute; top: 0; left: 0;">
									<img src="' . $ball_image . '" height="36" width="36" />
									</div>
									</div>
									</div>';
								}
							}
							$data['bowler_balls_data'] = $html;
						} else {
							$data['bowler_balls_data'] = $html;
						}

					}
				}
				echo json_encode($data);
			} else {
				$data['status'] = false;
				echo json_encode($data);
			}
		} else {
			$data['status'] = false;
			echo json_encode($data);
		}
	}
}
