<?php


class match extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_team_logged_in()) {
			redirect('team/login');
		}

		$this->load->model(array(
			'team/matches_model',
			'team/tournament_model',
			'team/player_model'
		));
	}

	public function index()
	{
		$team_id = $this->session->userdata('cpl')["team_id"];
		$data['title'] = 'Matches List';
		$data['matches'] = $this->matches_model->get_list_of_matches_by_id($team_id);
		$data['view'] = $this->load->view('team/match/match_list', $data, true);
		$this->load->view('team/template', $data);
	}
	public function match_team_list($match_id)
	{
		$team_id = $this->session->userdata('cpl')["team_id"];
		$data['title'] = 'Matches Squad List';
		$data['team'] = $this->matches_model->get_match_team_list($team_id, $match_id);
		$data['view'] = $this->load->view('team/match/match_team_list', $data, true);
		$this->load->view('team/template', $data);
	}

	public function submit_team($match_id, $tournament_id)
	{
		$data['title'] = 'Submit Matches Players';
		$data['match_id'] = $match_id;
		$team_id = $this->session->userdata('cpl')["team_id"];
		$data['match'] = $this->matches_model->get_match_by_id($match_id);
		$data['player_roles'] = $this->player_model->get_all_player_roles();
		$data['players'] = $this->tournament_model->get_tournament_players_by_team_id($team_id, $tournament_id);
		$data['view'] = $this->load->view('team/match/submit_team', $data, true);
		$this->load->view('team/template', $data);
	}

	public function submit_match_squad()
	{
		$players = json_decode($this->input->post('players'));
		$match_id = $this->input->post('match_id');
		$team_id = $this->session->userdata('cpl')["team_id"];

		$this->matches_model->delete_match_player($match_id, $team_id);

		foreach ($players as $player) {
			$match_player = array(
				'team_id' => $team_id,
				'match_id' => $match_id,
				'player_id' => ($player->player_id == 0) ? "3" : $player->player_id,
				'role_id' => $player->player_role,
				'created_date' => date('Y-m-d H:i:s')
			);

			$this->matches_model->insert_match_player($match_player);
		}

		echo "true";

	}

	/* Ajax function */
	public function add_team()
	{
		$players = $this->input->post('player_id');
		$captain_id = $this->input->post('captain');
		$wicket_keeper_id = $this->input->post('wicket');
		$twelfth_man = $this->input->post('twelfth_man');
		$match_id = $this->input->post('match_id');
		$team_id = $this->session->userdata('cpl')["team_id"];
		$data = $this->matches_model->check_player($match_id, $team_id);
		if ($data) {
			$res = $this->matches_model->delete_player($match_id, $team_id);
			if ($res) {
				for ($i = 0; $i < count($players); $i++) {
					if ($captain_id == $players[$i]) {
						$data = array(
							'team_id' => $this->session->userdata('cpl')["team_id"],
							'match_id' => $match_id,
							'player_id' => $players[$i],
							'role_id' => 1,
							'created_date' => date('Y-m-d H:i:s')
						);
					} else if ($wicket_keeper_id == $players[$i]) {
						$data = array(
							'team_id' => $this->session->userdata('cpl')["team_id"],
							'match_id' => $match_id,
							'player_id' => $players[$i],
							'role_id' => 2,

							'created_date' => date('Y-m-d H:i:s')
						);
					} else if ($wicket_keeper_id == $players[$i] && $captain_id == $players[$i]) {
						$data = array(
							'team_id' => $this->session->userdata('cpl')["team_id"],
							'match_id' => $match_id,
							'player_id' => $players[$i],
							'role_id' => 4,
							'created_date' => date('Y-m-d H:i:s')
						);
					} else if ($twelfth_man == $players[$i]) {
						$data = array(
							'team_id' => $this->session->userdata('cpl')["team_id"],
							'match_id' => $match_id,
							'player_id' => $players[$i],
							'role_id' => 5,
							'created_date' => date('Y-m-d H:i:s')
						);
					} else {
						$data = array(
							'team_id' => $this->session->userdata('cpl')["team_id"],
							'match_id' => $match_id,
							'player_id' => $players[$i],
							'role_id' => 3,
							'created_date' => date('Y-m-d H:i:s')
						);
					}
					$result = $this->matches_model->add_team($data);
				}
			}
		} else {
			for ($i = 0; $i < count($players); $i++) {
				if ($captain_id == $players[$i]) {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'match_id' => $match_id,
						'player_id' => $players[$i],
						'role_id' => 1,
						'created_date' => date('Y-m-d H:i:s')
					);
				} else if ($wicket_keeper_id == $players[$i]) {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'match_id' => $match_id,
						'player_id' => $players[$i],
						'role_id' => 2,

						'created_date' => date('Y-m-d H:i:s')
					);
				} else if ($wicket_keeper_id == $players[$i] && $captain_id == $players[$i]) {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'match_id' => $match_id,
						'player_id' => $players[$i],
						'role_id' => 4,
						'created_date' => date('Y-m-d H:i:s')
					);
				} else if ($twelfth_man == $players[$i]) {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'match_id' => $match_id,
						'player_id' => $players[$i],
						'role_id' => 5,
						'created_date' => date('Y-m-d H:i:s')
					);
				} else {
					$data = array(
						'team_id' => $this->session->userdata('cpl')["team_id"],
						'match_id' => $match_id,
						'player_id' => $players[$i],
						'role_id' => 3,
						'created_date' => date('Y-m-d H:i:s')
					);
				}
				$result = $this->matches_model->add_team($data);
			}
		}
		echo json_encode($result);
	}
}
