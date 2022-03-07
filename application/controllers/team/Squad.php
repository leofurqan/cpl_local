<?php
defined('BASEPATH') or exit('No direct script access allowed');

class squad extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_team_logged_in()) {
			redirect('team/login');
		}

		$this->load->model(array(
			'team/squad_model',
			'team/player_model',
			'team/tournament_model'
		));
	}

	public function submit_squad($tournament_id)
	{
		$data['title'] = 'Choose Squad';
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($tournament_id);
		if ($data['tournament']->squad_submission_date >= date('Y-m-d')) {
			if ($this->input->post('submit') === 'submit') {
				$tournament_player = array(
					'player_id' => $this->input->post('player_name'),
					'role_id' => $this->input->post('player_role'),
					'shirt_number' => $this->input->post('shirt_number'),
					'kit_size' => $this->input->post('player_kit_size'),
					'print_kit' => $this->input->post('print_kit'),
					'tournament_id' => $tournament_id,
					'team_id' => $this->session->userdata('cpl')['team_id'],
					'created_date' => date('Y-m-d H:i:s')
				);

				if ($this->squad_model->insert_tournament_player($tournament_player)) {
					$this->session->set_flashdata('message', 'Added');
				} else {
					$this->session->set_flashdata('exception', 'Please try Again');
				}
				redirect('team/squad/submit_squad/' . $tournament_id);
			}
		}

		$data['players'] = $this->player_model->get_player_by_team_id();
		$data['player_roles'] = $this->player_model->get_all_player_roles();
		$data['kit_sizes'] = $this->squad_model->get_all_kit_size();
		$data['squad'] = $this->squad_model->get_all_squad($this->session->userdata('cpl')["team_id"], $tournament_id);
		$data['tournament_id'] = $tournament_id;
		$data['view'] = $this->load->view('team/tournament_squad', $data, true);
		$this->load->view('team/template', $data);
	}

	/*
	 * AJAX Functions
	 */

	public function update_squad()
	{
		$team_id = $this->session->userdata('cpl')["team_id"];

		$squad = $this->squad_model->get_squad_by_team_id($team_id);
		if ($squad->num_rows() > 0) {
			$squad = array(
				'team_id' => $team_id,
				'updated_date' => date('Y-m-d H:i:s')
			);
			if ($this->squad_model->update_squad($squad->row()->id)) {
				echo "true";
			} else {
				echo "false";
			}
		} else {
			$squad = array(
				'team_id' => $team_id,
				'created_date' => date('Y-m-d H:i:s'),
				'updated_date' => date('Y-m-d H:i:s')
			);
			if ($this->squad_model->insert_squad($squad)) {
				echo "true";
			} else {
				echo "false";
			}
		}
	}

	public function squad_list()
	{
		$data['title'] = 'Squad List';

		$data['squad'] = $this->squad_model->get_squad_by_team_id($this->session->userdata('cpl')["team_id"])->row();
		$data['players'] = $this->player_model->get_player_by_team_id();
		$data['view'] = $this->load->view('team/squad_list', $data, true);
		$this->load->view('team/template', $data);

	}

	public function delete($player_id, $tournament_id)
	{
		if ($this->squad_model->delete_tournament_player($this->session->userdata('cpl')["team_id"], $player_id, $tournament_id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		redirect('team/squad/submit_squad/' . $tournament_id);
	}

	public function add_squad()
	{
		$tournament_id = $this->input->post('tournament_id');
		$players = json_decode($this->input->post('players'));
		$team_id = $this->session->userdata('cpl')["team_id"];

		$this->squad_model->delete_tournament_player($tournament_id, $team_id);

		foreach ($players as $player) {
			$tournament_player = array(
				'team_id' => $team_id,
				'tournament_id' => $tournament_id,
				'player_id' => ($player->player_id == 0) ? "3" : $player->player_id,
				'role_id' => $player->player_role,
				'shirt_number' => $player->shirt_number,
				'kit_size' => $player->kit_size,
				'created_date' => date('Y-m-d H:i:s')
			);

			$this->squad_model->insert_tournament_player($tournament_player);
		}

		echo "true";
	}

	/*	public function add_squad()
		{
			$players = $this->input->post('player_id');
			$captain_id = $this->input->post('captain');
			$wicket_keeper_id = $this->input->post('wicket');
			$shirt_no = $this->input->post('shirt_no');
			for ($i = 0; $i < count($players); $i++) {
				if ($captain_id == $players[$i]) {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'tournament_id' => $this->input->post('id'),
						'player_id' => $players[$i],
						'role_id' => 1,
						'shirt_number' => $shirt_no[$i],
						'kit_size' => $this->input->post('kit_size')[$i],
						'created_date' => date('Y-m-d H:i:s')
					);
				} else if ($wicket_keeper_id == $players[$i]) {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'tournament_id' => $this->input->post('id'),
						'player_id' => $players[$i],
						'role_id' => 2,
						'shirt_number' => $shirt_no[$i],
						'kit_size' => $this->input->post('kit_size')[$i],
						'created_date' => date('Y-m-d H:i:s')
					);
				} else if ($wicket_keeper_id == $players[$i] && $captain_id == $players[$i]) {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'tournament_id' => $this->input->post('id'),
						'player_id' => $players[$i],
						'role_id' => 4,
						'shirt_number' => $shirt_no[$i],
						'kit_size' => $this->input->post('kit_size')[$i],
						'created_date' => date('Y-m-d H:i:s')
					);
				} else {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'tournament_id' => $this->input->post('id'),
						'player_id' => $players[$i],
						'role_id' => 3,
						'shirt_number' => $shirt_no[$i],
						'kit_size' => $this->input->post('kit_size')[$i],
						'created_date' => date('Y-m-d H:i:s')
					);
				}
				$result = $this->squad_model->add_players_tournament($data);
			}
			echo json_encode($result);
		}*/

	function check_player()
	{
		$player_id = $this->input->post('player_id');
		$result = $this->squad_model->check_player($player_id);
		if ($result > 0) {
			echo json_encode(true);
		}
	}

	function check_captain()
	{
		$role = $this->input->post('role_id');
		$tournament_id = $this->input->post('tournament_id');
		$result = $this->squad_model->check_role($role,$tournament_id);
		if ($result > 0) {
			echo json_encode(true);
		}
	}

	function check_shirt_number()
	{
		$shirt_number = $this->input->post('shirt_number');
		$tournament_id = $this->input->post('tournament_id');
		$result = $this->squad_model->check_shirt_number($shirt_number,$tournament_id);
		if ($result > 0) {
			echo json_encode(true);
		}
	}
}
