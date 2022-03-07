<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Scoring extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'api/cpl_scorer/matches_model',
			'api/cpl_scorer/team_model',
			'api/cpl_scorer/scoring_model',
			'api/cpl_scorer/wickets_model'
		));
	}

	/*
	 * Matches Scoring = 0 (Innings not started yet)
	 */

	public function match_scoring_get()
	{
		$match_id = $this->input->get('match_id');

		if (!empty($match_id)) {
			$match = $this->matches_model->getMatchByID($match_id);
			$batting = array();
			$bowling = array();

			if ($match->first_team_id == $match->toss_winner) {
				if ($match->toss_decide == 1) {
					$batting["team"] = $this->team_model->getTeamByID($match->first_team_id);
					$batting["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->first_team_id, $match->tournament_id);

					$bowling["team"] = $this->team_model->getTeamByID($match->second_team_id);
					$bowling["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->second_team_id, $match->tournament_id);
				} else {
					$batting["team"] = $this->team_model->getTeamByID($match->second_team_id);
					$batting["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->second_team_id, $match->tournament_id);

					$bowling["team"] = $this->team_model->getTeamByID($match->first_team_id);
					$bowling["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->first_team_id, $match->tournament_id);
				}
			} else if ($match->second_team_id == $match->toss_winner) {
				if ($match->toss_decide == 1) {
					$batting["team"] = $this->team_model->getTeamByID($match->second_team_id);
					$batting["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->second_team_id, $match->tournament_id);

					$bowling["team"] = $this->team_model->getTeamByID($match->first_team_id);
					$bowling["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->first_team_id, $match->tournament_id);
				} else {
					$batting["team"] = $this->team_model->getTeamByID($match->first_team_id);
					$batting["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->first_team_id, $match->tournament_id);

					$bowling["team"] = $this->team_model->getTeamByID($match->second_team_id);
					$bowling["squad"] = $this->matches_model->getMatchSquadByTeamID($match_id, $match->second_team_id, $match->tournament_id);
				}
			}

			$this->response(array(
				'status' => TRUE,
				'batting_team' => $batting,
				'bowling_team' => $bowling,
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	public function start_innings_post()
	{
		$innings_data = json_decode($this->input->post('innings'));
		if (!empty($innings_data)) {
			if (!empty($innings_data->match_id) && !empty($innings_data->team_batting) && !empty($innings_data->team_bowling) && !empty($innings_data->striker) && !empty($innings_data->non_striker) && !empty($innings_data->bowler) && !empty($innings_data->inning_no)) {
				if ($innings_data->inning_no == 1) {
					$data = array(
						'match_id' => $innings_data->match_id,
						'batting_team' => $innings_data->team_batting,
						'bowling_team' => $innings_data->team_bowling,
						'facing_id' => $innings_data->striker,
						'non_facing_id' => $innings_data->non_striker,
						'bowler' => $innings_data->bowler,
						'innings_no' => $innings_data->inning_no,
						'status' => 1,
					);
					if ($this->scoring_model->update_innings_data($innings_data->match_id, $innings_data->inning_no, $data)) {
						$this->response(array(
							'status' => true,
						), 200);
					} else {
						$this->response(array(
							'status' => FALSE,
							'message' => 'Something Went wrong'
						), 200);
					}
				} else {
					$data = array(
						'match_id' => $innings_data->match_id,
						'batting_team' => $innings_data->team_batting,
						'bowling_team' => $innings_data->team_bowling,
						'facing_id' => $innings_data->striker,
						'non_facing_id' => $innings_data->non_striker,
						'bowler' => $innings_data->bowler,
						'innings_no' => $innings_data->inning_no,
						'status' => 1,
					);
					if ($this->scoring_model->add_innings_data($data)) {
						$this->response(array(
							'status' => true,
							'data' => $data,
						), 200);
					} else {
						$this->response(array(
							'status' => FALSE,
							'message' => 'Something Went wrong'
						), 200);
					}
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid Request'
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	public function end_innings_post()
	{
		$events = json_decode($this->input->post('events'));

		if (!empty($events->match_id) && !empty($events->innings_no)) {
			$data = array(
				'status' => 3,
			);
			if ($this->scoring_model->update_innings_data($events->match_id, $events->innings_no, $data)) {
				$this->add_events($events);
				$this->response(array(
					'status' => true,
					'message' => 'Inning Ended Successfully'
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Something went wrong'
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	public function ball_by_ball_post()
	{
		$ball_by_ball = json_decode($this->input->post('ball_by_ball'));
		$wicket = json_decode($this->input->post('wicket'));
		$batsman_score = json_decode($this->input->post('batsman_score'));
		$extra_runs = json_decode($this->input->post('extra_runs'));
		$sync_id = $this->input->post('sync_id');

		if (!empty($ball_by_ball)) {
			foreach ($ball_by_ball as $bbb) {
				if ($this->scoring_model->get_ball_by_ball($bbb->match_id, $bbb->inning_no, $bbb->over_id, $bbb->ball_id)) {
					$ball_by_ball_id = $this->scoring_model->get_ball_by_ball($bbb->match_id, $bbb->inning_no, $bbb->over_id, $bbb->ball_id)->id;
					$this->scoring_model->del_ball_by_ball($ball_by_ball_id);
				}
				$data = array(
					'match_id' => $bbb->match_id,
					'over_id' => $bbb->over_id,
					'ball_id' => $bbb->ball_id,
					'innings_no' => $bbb->inning_no,
					'team_batting' => $bbb->team_batting,
					'team_bowling' => $bbb->team_bowling,
					'striker' => $bbb->striker,
					'non_striker' => $bbb->non_striker,
					'bowler' => $bbb->bowler,
				);
				if (!$this->scoring_model->ball_by_ball($data)) {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something Went wrong in ball_by_ball'
					), 200);
				}
			}
		}

		if (!empty($batsman_score)) {
			foreach ($batsman_score as $bs) {
				if ($this->scoring_model->get_batsman_score($bs->match_id, $bs->innings_no, $bs->over_id, $bs->ball_id)) {
					$batsman_score_id = $this->scoring_model->get_batsman_score($bs->match_id, $bs->innings_no, $bs->over_id, $bs->ball_id)->id;
					$this->scoring_model->del_batsman_score($batsman_score_id);
				}
				$data_batsman = array(
					'match_id' => $bs->match_id,
					'over_id' => $bs->over_id,
					'ball_id' => $bs->ball_id,
					'runs_scored' => $bs->runs_scored,
					'innings_no' => $bs->innings_no,
				);
				if (!$this->scoring_model->add_batsman_score($data_batsman)) {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something Went wrong in batsman_score'
					), 200);
				}
			}
		}

		if (!empty($wicket)) {
			foreach ($wicket as $w) {
				if ($this->scoring_model->get_wicket($w->match_id, $w->innings_no, $w->over_id, $w->ball_id)) {
					$wicket_id = $this->scoring_model->get_wicket($w->match_id, $w->innings_no, $w->over_id, $w->ball_id)->id;
					$this->scoring_model->del_wicket($wicket_id);
				}
				$data_wicket = array(
					'match_id' => $w->match_id,
					'over_id' => $w->over_id,
					'ball_id' => $w->ball_id,
					'player_id' => $w->player_id,
					'wicket_type' => $w->wicket_type,
					'fielder' => $w->fielder,
					'innings_no' => $w->innings_no,
				);
				if (!$this->scoring_model->add_wicket($data_wicket)) {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something Went wrong in wickets'
					), 200);
				}
			}
		}

		if (!empty($extra_runs)) {
			foreach ($extra_runs as $er) {
				if ($this->scoring_model->get_extra_runs($er->match_id, $er->innings_no, $er->over_id, $er->ball_id, $er->extra_type_id)) {
					$extra_runs_id = $this->scoring_model->get_extra_runs($er->match_id, $er->innings_no, $er->over_id, $er->ball_id, $er->extra_type_id)->id;
					$this->scoring_model->del_extra_runs($extra_runs_id);
				}
				$data_extra_runs = array(
					'match_id' => $er->match_id,
					'over_id' => $er->over_id,
					'ball_id' => $er->ball_id,
					'extra_type_id' => $er->extra_type_id,
					'extra_runs' => $er->extra_runs,
					'innings_no' => $er->innings_no,
				);
				if (!$this->scoring_model->extra_runs($data_extra_runs)) {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something Went wrong in extra_runs'
					), 200);
				}
			}
		}

		$this->response(array(
			'status' => true,
			'sync_id' => $sync_id,
			'message' => 'Data Submitted Successfully'
		), 200);
	}


	//end_over
	public function end_over_post()
	{
		$events = json_decode($this->input->post('event'));

		if (!empty($events->match_id) && !empty($events->inning_id)) {
			$data = array(
				'status' => 2,
			);
			if ($this->scoring_model->update_innings_data($events->match_id, $events->inning_id, $data)) {
				$this->response(array(
					'status' => true,
					'message' => 'Over Ended Successfully'
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Something went wrong'
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	// next batsman
	public function next_batsman_post()
	{
		$next_batsman = json_decode($this->input->post('innings'));
		$events = json_decode($this->input->post('events'));
		if (!empty($next_batsman)) {
			if (!empty($next_batsman->match_id) && !empty($next_batsman->team_batting) && !empty($next_batsman->team_bowling) && !empty($next_batsman->striker) && !empty($next_batsman->non_striker) && !empty($next_batsman->bowler) && !empty($next_batsman->inning_no)) {
				$data = array(
					'match_id' => $next_batsman->match_id,
					'batting_team' => $next_batsman->team_batting,
					'bowling_team' => $next_batsman->team_bowling,
					'facing_id' => $next_batsman->striker,
					'non_facing_id' => $next_batsman->non_striker,
					'bowler' => $next_batsman->bowler,
					'innings_no' => $next_batsman->inning_no);
				if ($this->scoring_model->update_innings_data($next_batsman->match_id, $next_batsman->inning_no, $data)) {
					$this->add_events($events);
					$this->response(array(
						'status' => true,
						'message' => 'Batsman Added Successfully'
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something went wrong'
					), 200);
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid Request'
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}

	}

	//next bowler
	public function next_bowler_post()
	{
		$innings = json_decode($this->input->post('innings'));
		if (!empty($innings)) {
			if (!empty($innings->match_id) && !empty($innings->inning_no)) {
				$data = array(
					'match_id' => $innings->match_id,
					'bowler' => $innings->bowler,
					'innings_no' => $innings->inning_no,
					'status' => 1,
				);
				if ($this->scoring_model->update_innings_data($innings->match_id, $innings->inning_no, $data)) {
					$this->response(array(
						'status' => true,
						'message' => 'Bowler Added Successfully'
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something went wrong'
					), 200);
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid Request'
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}

	}

	// switch blower
	public function switch_bolwer_post()
	{
		$events = json_decode($this->input->post('events'));
		if (!empty($events)) {
			if ($events->same_bowler == 1) {
				$last_bolwer = $this->scoring_model->get_last_bolwer_to_switch($events->match_id, $events->innings_no);
				if ($last_bolwer) {
					$data = array(
						'bowler' => $events->bowler
					);
					$this->scoring_model->update_ball_by_ball($last_bolwer->over_id, $last_bolwer->match_id, $last_bolwer->innings_no, $last_bolwer->bowler, $data);
				}
			}

			$data = array(
				'match_id' => $events->match_id,
				'bowler' => $events->bowler,
				'innings_no' => $events->innings_no);
			if ($this->scoring_model->update_innings_data($events->match_id, $events->innings_no, $data)) {
				$this->add_events($events);
				$this->response(array(
					'status' => true,
					'message' => 'Bolwer Updated Successfully'
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Something went wrong'
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	// shuffle batsman

	public function shuffle_batsman_post()
	{
		$shuffle_batsman = json_decode($this->input->post('innings'));
		if (!empty($shuffle_batsman)) {
			if (!empty($shuffle_batsman->match_id) &&
				!empty($shuffle_batsman->team_batting)
				&& !empty($shuffle_batsman->team_bowling)
				&& !empty($shuffle_batsman->striker) &&
				!empty($shuffle_batsman->non_striker)
				&& !empty($shuffle_batsman->bowler)
				&& !empty($shuffle_batsman->inning_no)) {
				$data = array(
					'match_id' => $shuffle_batsman->match_id,
					'batting_team' => $shuffle_batsman->team_batting,
					'bowling_team' => $shuffle_batsman->team_bowling,
					'facing_id' => $shuffle_batsman->striker,
					'non_facing_id' => $shuffle_batsman->non_striker,
					'bowler' => $shuffle_batsman->bowler,
					'innings_no' => $shuffle_batsman->inning_no);
				if ($this->scoring_model->update_innings_data($shuffle_batsman->match_id, $shuffle_batsman->inning_no, $data)) {
					$this->response(array(
						'status' => true,
						'message' => 'Batsman Updated Successfully'
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something went wrong'
					), 200);
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid Request'
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	//overlay_score update

	public
	function innings_update($match_id, $innings_no, $facing_id, $non_facing_id, $bowler)
	{
		$result = $this->scoring_model->get_last_row_by_match_id($match_id);
		if ($result) {
			$data = array(
				'facing_id' => $facing_id,
				'non_facing_id' => $non_facing_id,
				'bowler' => $bowler,
				'status' => 1,
			);
			if ($this->scoring_model->update_innings_data($match_id, $innings_no, $data)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	//undo
	public function undo_post()
	{
		$event = json_decode($this->input->post('event'));
		if (!empty($event)) {
			if ($event->event_type_id == "1") { // Undo Start Innings
				if ($event->inning_id == "1") {
					$data = array(
						'facing_id' => 0,
						'non_facing_id' => 0,
						'bowler' => 0,
						'status' => 0
					);
					if ($this->scoring_model->update_innings_data($event->match_id, $event->inning_id, $data)) {
						$this->response(array(
							'status' => true,
						), 200);
					} else {
						$this->response(array(
							'status' => FALSE,
							'message' => 'Something Went wrong'
						), 200);
					}
				} else {
					if ($this->scoring_model->delete_innings_data($event->match_id, $event->inning_id)) {
						$this->response(array(
							'status' => true,
						), 200);
					} else {
						$this->response(array(
							'status' => FALSE,
							'message' => 'Something Went wrong'
						), 200);
					}
				}
			} else if ($event->event_type_id == "2") {
				if ($this->scoring_model->undo($event->match_id, $event->inning_id, $event->over_id, $event->ball_id) >= 1) {
					$this->response(array(
						'status' => TRUE,
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Something went wrong...'
					), 200);
				}
			}
		} else {
			$this->response(array(
				'status' => FALSE,
			), 404);
		}
	}

	public function get_all_penalties_get()
	{
		$result = $this->scoring_model->get_all_penalties_types();
		if ($result) {
			$this->response(array(
				'status' => true,
				'data' => $result
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
			), 200);
		}
	}

	public function add_penalty_post()
	{
		/*$penalty = json_decode($this->input->post('penalty'));
		$events = json_decode($this->input->post('events'));
		if (!empty($penalty)) {
			if (!empty($penalty->match_id) && !empty($penalty->ball_id)
				&& !empty($penalty->inning_no) && !empty($penalty->over_id)
				&& !empty($penalty->penalty_runs) && !empty($penalty->penalty_to)) {
				$data = array(
					'match_id' => $penalty->match_id,
					'ball_id' => $penalty->ball_id,
					'inning_no' => $penalty->inning_no,
					'over_id' => $penalty->over_id,
					'penalty_runs' => $penalty->penalty_runs,
					'penalty_type' => $penalty->penalty_type,
					'created_date' => date('Y-m-d H:i:s')
				);
				if ($this->scoring_model->add_penalty($data)) {
					$this->add_events($events);
					$this->response(array(
						'status' => true,
						'message' => 'Penalty Added Successfully'
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
					), 200);
				}

			}
			else{*/
		$match_id = $this->input->post('match_id');
		$ball_id = $this->input->post('ball_id');
		$inning_no = $this->input->post('inning_no');
		$over_id = $this->input->post('over_id');
		$penalty_runs = $this->input->post('penalty_runs');
		$team_id = $this->input->post('team_id');
		$penalty_type = $this->input->post('penalty_type');

		if (!empty($match_id) && !empty($ball_id)
			&& !empty($inning_no) && !empty($over_id)
			&& !empty($penalty_runs) && !empty($team_id)) {
			$data = array(
				'match_id' => $match_id,
				'ball_id' => $ball_id,
				'inning_no' => $inning_no,
				'over_id' => $over_id,
				'team_id' => $team_id,
				'penalty_runs' => $penalty_runs,
				'penalty_type_id' => $penalty_type,
			);
			if ($this->scoring_model->add_penalty($data)) {
				$this->response(array(
					'status' => true,
					'message' => 'Penalty Added Successfully'
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
			), 404);
		}
	}

	function add_events($events)
	{
		if (!empty($events)) {
			$events = array(
				'event_id' => $events->event_id,
				'ball_id' => $events->ball_id,
				'over_id' => $events->over_id,
				'match_id' => $events->match_id,
				'inning_no' => $events->innings_no,
				'bowler_id' => $events->bowler_id,
				'is_bowler_same' => $events->is_bowler_same,
				'switch_bowler_id' => $events->switch_bowler_id,
				'retire_batsman_id' => $events->retire_batsman_id,
			);
			if (!$this->scoring_model->add_events($events)) {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Something Went wrong in events'
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
			), 404);
		}
	}
}
