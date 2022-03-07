<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Matches extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'api/cpl_team/matches_model'
		));
	}

	public function matches_get()
	{
		$user_type = $this->input->get("user_type");
		$id = $this->input->get("id");
		$tournament_id = $this->input->get("tournament_id");

		if (!empty($user_type)) {
			if ($user_type === "team") {
				if (!empty($id)) {
					$matches = $this->matches_model->getMatchesByTeamID($id);

					$this->response(array(
						'status' => TRUE,
						'matches' => $matches
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Invalid Request',
					), 404);
				}
			} else if ($user_type === "player") {
				if (!empty($id)) {
					$matches = $this->matches_model->getMatchesByPlayerID($id);

					$this->response(array(
						'status' => TRUE,
						'matches' => $matches
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Invalid Request',
					), 404);
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid User Type',
				), 404);
			}
		} else if (!empty($tournament_id)) {
			$matches = $this->matches_model->getMatchesByTournamentID($tournament_id);
			$this->response(array(
				'status' => TRUE,
				'matches' => $matches
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function squad_get()
	{
		$match_id = $this->input->get('match_id');

		if (!empty($match_id)) {
			$match = $this->matches_model->getMatchByID($match_id);
			$team_1_squad = $this->matches_model->getMatchSquadByTeamID($match_id, $match->first_team_id, $match->tournament_id);
			$team_2_squad = $this->matches_model->getMatchSquadByTeamID($match_id, $match->second_team_id, $match->tournament_id);

			$this->response(array(
				'status' => TRUE,
				'team_1_squad' => $team_1_squad,
				'team_2_squad' => $team_2_squad
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function save_squad_post()
	{
		$match_id = $this->input->get('match_id');
		$team_id = $this->input->get('team_id');
		$players = json_decode($this->input->post('players'), true);

		if (!empty($match_id) && !empty($team_id)) {
			$match = $this->matches_model->getMatchByID($match_id);

			if ($match->status == "0") {
				if ($this->matches_model->deleteMatchPlayers($match_id, $team_id)) {
					foreach ($players as $player) {
						$player = array(
							'match_id' => $match_id,
							'team_id' => $team_id,
							'player_id' => $player["id"],
							'role_id' => $player["role_id"],
							'created_date' => date('Y-m-d H:i:s')
						);

						$this->matches_model->insertMatchPlayer($player);
					}

					$this->response(array(
						'status' => TRUE,
					), 200);
				} else {
					$this->response(array(
						'status' => FALSE,
						'message' => 'Failed to Submit Matches Squad'
					), 404);
				}
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Matches has already been started...'
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	public function matches_by_player_get()
	{
		$player_id = $this->input->get("player_id");

		if (!empty($player_id)) {
			$matches = $this->matches_model->getMatchesByPlayerID($player_id);

			$this->response(array(
				'status' => TRUE,
				'matches' => $matches
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}
	
	public function get_match_by_id_get()
	{
		$id = $this->input->get('id');
		if (!empty($id)) {
			$result = $this->matches_model->get_match_by_id($id);
			if ($result) {
				$this->response(array(
					'status' => true,
					'message' => $result
				), 200);
			} else {
				$this->response(array(
					'status' => false,
				), 200);
			}
    } else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}
}
