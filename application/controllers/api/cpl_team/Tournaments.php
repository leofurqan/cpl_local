<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Tournaments extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'api/cpl_team/tournaments_model'
		));
	}

	public function tournaments_get()
	{
		$user_type = $this->input->get("user_type");
		$id = $this->input->get("id");

		if (!empty($user_type) && !empty($id)) {
			if ($user_type === "team") {
				$tournaments = $this->tournaments_model->getTournamentsByTeamID($id);

				$this->response(array(
					'status' => TRUE,
					'tournaments' => $tournaments
				), 200);
			} else if ($user_type === "player") {
				$tournaments = $this->tournaments_model->getTournamentsByPlayerID($id);

				$this->response(array(
					'status' => TRUE,
					'tournaments' => $tournaments
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid User Type',
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function save_squad_post()
	{
		$team_id = $this->input->get("team_id");
		$tournament_id = $this->input->get("tournament_id");
		$players = json_decode($this->input->post('players'), true);

		if (!empty($team_id) && !empty($tournament_id) && sizeof($players) > 0) {
			if ($this->tournaments_model->deleteTournamentPlayers($team_id, $tournament_id)) {
				foreach ($players as $player) {
					$player = array(
						'team_id' => $team_id,
						'tournament_id' => $tournament_id,
						'player_id' => $player["id"],
						'role_id' => $player["role_id"],
						'shirt_number' => $player["shirt_number"],
						'kit_size' => $player["kit_size_id"],
						'print_kit' => $player["print_kit"],
						'created_date' => date('Y-m-d H:i:s')
					);

					$this->tournaments_model->insertTournamentPlayer($player);
				}

				$this->response(array(
					'status' => TRUE,
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Failed to Submit Tournament Squad'
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request'
			), 404);
		}
	}

	public function squad_get()
	{
		$team_id = $this->input->get('team_id');
		$tournament_id = $this->input->get('tournament_id');

		if (!empty($team_id) && !empty($tournament_id)) {
			$tournament = $this->tournaments_model->getTournamentSquadDateByID($tournament_id);
			$squad = $this->tournaments_model->getTournamentSquadByTeamID($team_id, $tournament_id);
			$this->response(array(
				'status' => TRUE,
				'squad_submission_date' => $tournament->squad_submission_date,
				'squad' => $squad
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function teams_get()
	{
		$tournament_id = $this->input->get('tournament_id');

		if (!empty($tournament_id)) {
			$teams = $this->tournaments_model->getTournamentTeamsByID($tournament_id);
			$this->response(array(
				'status' => TRUE,
				'teams' => $teams
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function pools_get()
	{
		$tournament_id = $this->input->get('tournament_id');

		if (!empty($tournament_id)) {
			$pools = $this->tournaments_model->getTournamentPoolsByID($tournament_id);

			$teams = array();

			foreach ($pools as $pool) {
				$teams[] = $this->tournaments_model->getTeamsByPoolID($pool->id);
			}

			$this->response(array(
				'status' => TRUE,
				'pools' => $pools,
				'teams' => $teams,
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function about_get()
	{
		$user_type = $this->input->get("user_type");
		$id = $this->input->get("id");
		$tournament_id = $this->input->get('tournament_id');

		if (!empty($user_type) && !empty($id) && !empty($tournament_id)) {
			if ($user_type === "team") {
				$about = $this->tournaments_model->getTournamentAboutByTeamID($id, $tournament_id);
				$this->response(array(
					'status' => TRUE,
					'about' => $about
				), 200);
			} else if ($user_type === "player") {
				$about = $this->tournaments_model->getTournamentAboutByPlayerID($id, $tournament_id);

				$this->response(array(
					'status' => TRUE,
					'tournaments' => $about
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Invalid User Type',
				), 404);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function accept_invitation_get()
	{
		$team_id = $this->input->get('team_id');
		$tournament_id = $this->input->get('tournament_id');

		if (!empty($team_id) && !empty($tournament_id)) {
			$invitation = array(
				'status' => 1,
				'updated_date' => date('Y-m-d H:i:s')
			);
			if ($this->tournaments_model->acceptInvitation($invitation, $team_id, $tournament_id)) {
				$this->response(array(
					'status' => TRUE,
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Something went wrong...'
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function get_leaderboard_get()
	{
		$tournament_id = $this->input->get('id');
		if (!empty($tournament_id)) {

			$best_batsman = $this->tournaments_model->get_top_5_batsman_by_tournament_id($tournament_id);
			$best_bowler = $this->tournaments_model->get_top_5_bowlers_by_tournament_id($tournament_id);
			$super_six = $this->tournaments_model->get_top_5_super_six_count_by_tournament_id($tournament_id);
			$best_fielders = $this->tournaments_model->get_top_5_best_fielders_by_tournament_id($tournament_id);
			$best_wicket_kepper = $this->tournaments_model->get_top_5_best_wicket_keepers_by_tournament_id($tournament_id);


			$this->response(array(
				'status' => true,
				'data' => array(
					'best_batsmans' => $best_batsman,
					'best_bowlers' => $best_bowler,
					'super_sixs' => $super_six,
					'best_fielders' => $best_fielders,
					'best_wicket_kepper' => $best_wicket_kepper
				),
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}
}
