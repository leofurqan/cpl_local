<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;


class Squads extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'api/squad_model'
		));
	}

//players -> [{"id":"1","image":"","isChecked":true,"is_captain":true,"is_twelve_man":false,"is_wicket_keeper":false,"kit_size":"2","name":"All Rounder","player_name":"Ahsan Zaidi","shirt_number":"1"},{"id":"2","image":"","isChecked":true,"is_captain":false,"is_twelve_man":false,"is_wicket_keeper":true,"kit_size":"2","name":"All Rounder","player_name":"Ali Sikander","shirt_number":"2"},{"id":"3","image":"","isChecked":true,"is_captain":false,"is_twelve_man":false,"is_wicket_keeper":false,"kit_size":"2","name":"Batsman","player_name":"Sadeem Baig","shirt_number":"3"},{"id":"4","image":"","isChecked":true,"is_captain":false,"is_twelve_man":false,"is_wicket_keeper":false,"kit_size":"4","name":"All Rounder","player_name":"Abdullah Ijaz","shirt_number":"5"},{"id":"5","image":"","isChecked":true,"is_captain":false,"is_twelve_man":false,"is_wicket_keeper":false,"kit_size":"2","name":"All Rounder","player_name":"Dilshad Ahmed","shirt_number":"6"},{"id":"6","image":"","isChecked":true,"is_captain":false,"is_twel

	public function add_squad_post()
	{
		$data["team_id"] = $this->input->post('team_id');
		$data["tournament_id"] = $this->input->post('tournament_id');
		$players = json_decode($this->input->post('players'), true);

		if (!empty($data["team_id"]) && !empty($data["tournament_id"]) && !empty($players)) {
			foreach ($players as $player) {
				$squad = array(
					'player_id' => $player["id"],
					'is_wicket_keeper' => $player["is_wicket_keeper"],
					'is_captain' => $player["is_captain"],
					'is_shirt_number' => $player["shirt_number"],
					'is_kit_size' => $player["kit_size"],
					'team_id' => $data["team_id"],
					'tournament_id' => $data["tournament_id"],
					'created_date' => date('Y-m-d H:i:s')
				);

				$this->squad_model->insert_squad($squad);
			}
			$this->response(array(
				'status' => TRUE,
				'message' => 'Submit Successfully',
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}


	public function squad_list_get()
	{
		$data['team_id'] = $this->input->get("team_id");
		if (!empty($data["team_id"])) {
			$squad = $this->squad_model->get_all_squad($data["team_id"]);
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
