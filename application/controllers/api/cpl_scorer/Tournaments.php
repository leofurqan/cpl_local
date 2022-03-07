<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Tournaments extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'api/cpl_scorer/tournaments_model'
		));
	}

	public function squad_get()
	{
		$team_id = $this->input->get('team_id');
		$tournament_id = $this->input->get('tournament_id');

		if (!empty($team_id) && !empty($tournament_id)) {
			$squad = $this->tournaments_model->getTournamentSquadByTeamID($team_id, $tournament_id);
			$this->response(array(
				'status' => TRUE,
				'squad' => $squad
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}
}
