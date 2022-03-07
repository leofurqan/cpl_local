<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Home extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'notification_model',
			'api/cpl_team/home_model',
			'api/cpl_team/matches_model',
			'api/cpl_team/tournaments_model'
		));
	}

	public function team_get()
	{
		$id = $this->input->get("id");
		if (!empty($id)) {
			$stats = $this->home_model->getStatsByTeamID($id);
			$matches = $this->matches_model->getUpComingMatchesByTeamID($id);
			$tournaments = $this->tournaments_model->getUpComingTournamentsByTeamID($id);
			$notification = $this->notification_model->getNotificationCountByTeamID($id);

			$this->response(array(
				'status' => TRUE,
				'notification' => $notification->notification_count,
				'stats' => $stats,
				'matches' => $matches,
				'tournaments' => $tournaments
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function player_get()
	{
		$id = $this->input->get("id");
		if (!empty($id)) {
			$stats = $this->home_model->getStatsByPlayerID($id);
			$matches = $this->matches_model->getUpComingMatchesByPlayerID($id);
			$tournaments = $this->tournaments_model->getUpComingTournamentsByPlayerID($id);
			$player_score = $this->home_model->get_player_total_score($id);
			$balls = $this->home_model->get_bowler_count($id);
			$fifties = $this->home_model->get_no_of_fifties_by_player_id($id)->num_of_fifties;
			$hundreds = $this->home_model->get_no_of_hundreds_by_player_id($id)->num_of_hundreds;
			$this->response(array(
				'status' => TRUE,
				'stats' => $stats,
				'matches' => $matches,
				'tournaments' => $tournaments,
				'player_score'=>$player_score,
				'balls'=>$balls ? $balls :0,
				'fifties'=>$fifties,
				'hundreds'=>$hundreds
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}

	public function get_teams_by_player_get()
	{
		$id = $this->input->get("id");
		if (!empty($id)) {
			$teams = $this->home_model->get_teams_by_player_id($id);
			if ($teams){
				$this->response(array(
					'status' => TRUE,
					'teams' => $teams,
				), 200);
			}
			else{
				$this->response(array(
					'status' => FALSE
				), 200);
			}

		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}
}
