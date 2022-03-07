<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matches extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_marketing_manager_logged_in()) {
			redirect('marketing_manager/login');
		}

		$this->load->model(array(
			'marketing_manager/matches_model'
		));
	}

	public function match_summary()
	{
		$data['title'] = 'Matches Summary';
		$data['match_summary'] = $this->matches_model->get_all_match_summary();
		$data['view'] = $this->load->view('marketing_manager/matches/match_summary', $data, true);
		$this->load->view('marketing_manager/template', $data);
	}

	public function add_match_summary()
	{
		$data['title'] = 'Add Matches Summary';

		if ($this->input->post('submit') === 'submit') {
			$match_summary = array(
				'tournament_id' => $this->input->post('tournament_id'),
				'pool_name' => $this->input->post('pool_name'),
				'first_team_id' => $this->input->post('first_team_id'),
				'first_team_score' => $this->input->post('first_team_score'),
				'first_team_wickets' => $this->input->post('first_team_wickets'),
				'first_team_overs_played' => $this->input->post('first_team_overs_played'),
				'first_team_batting_player_1_name' => $this->input->post('first_team_batting_player_1_name'),
				'first_team_batting_player_1_score' => $this->input->post('first_team_batting_player_1_score'),
				'first_team_batting_player_1_balls' => $this->input->post('first_team_batting_player_1_balls'),
				'first_team_batting_player_2_name' => $this->input->post('first_team_batting_player_2_name'),
				'first_team_batting_player_2_score' => $this->input->post('first_team_batting_player_2_score'),
				'first_team_batting_player_2_balls' => $this->input->post('first_team_batting_player_2_balls'),
				'first_team_batting_player_3_name' => $this->input->post('first_team_batting_player_3_name'),
				'first_team_batting_player_3_score' => $this->input->post('first_team_batting_player_3_score'),
				'first_team_batting_player_3_balls' => $this->input->post('first_team_batting_player_3_balls'),
				'first_team_bowling_player_1_name' => $this->input->post('first_team_bowling_player_1_name'),
				'first_team_bowling_player_1_score' => $this->input->post('first_team_bowling_player_1_score'),
				'first_team_bowling_player_1_balls' => $this->input->post('first_team_bowling_player_1_balls'),
				'first_team_bowling_player_2_name' => $this->input->post('first_team_bowling_player_2_name'),
				'first_team_bowling_player_2_score' => $this->input->post('first_team_bowling_player_2_score'),
				'first_team_bowling_player_2_balls' => $this->input->post('first_team_bowling_player_2_balls'),
				'first_team_bowling_player_3_name' => $this->input->post('first_team_bowling_player_3_name'),
				'first_team_bowling_player_3_score' => $this->input->post('first_team_bowling_player_3_score'),
				'first_team_bowling_player_3_balls' => $this->input->post('first_team_bowling_player_3_balls'),
				'second_team_id' => $this->input->post('second_team_id'),
				'second_team_score' => $this->input->post('second_team_score'),
				'second_team_wickets' => $this->input->post('second_team_wickets'),
				'second_team_overs_played' => $this->input->post('second_team_overs_played'),
				'second_team_batting_player_1_name' => $this->input->post('second_team_batting_player_1_name'),
				'second_team_batting_player_1_score' => $this->input->post('second_team_batting_player_1_score'),
				'second_team_batting_player_1_balls' => $this->input->post('second_team_batting_player_1_balls'),
				'second_team_batting_player_2_name' => $this->input->post('second_team_batting_player_2_name'),
				'second_team_batting_player_2_score' => $this->input->post('second_team_batting_player_2_score'),
				'second_team_batting_player_2_balls' => $this->input->post('second_team_batting_player_2_balls'),
				'second_team_batting_player_3_name' => $this->input->post('second_team_batting_player_3_name'),
				'second_team_batting_player_3_score' => $this->input->post('second_team_batting_player_3_score'),
				'second_team_batting_player_3_balls' => $this->input->post('second_team_batting_player_3_balls'),
				'second_team_bowling_player_1_name' => $this->input->post('second_team_bowling_player_1_name'),
				'second_team_bowling_player_1_score' => $this->input->post('second_team_bowling_player_1_score'),
				'second_team_bowling_player_1_overs' => $this->input->post('second_team_bowling_player_1_overs'),
				'second_team_bowling_player_2_name' => $this->input->post('second_team_bowling_player_2_name'),
				'second_team_bowling_player_2_score' => $this->input->post('second_team_bowling_player_2_score'),
				'second_team_bowling_player_2_overs' => $this->input->post('second_team_bowling_player_2_overs'),
				'second_team_bowling_player_3_name' => $this->input->post('second_team_bowling_player_3_name'),
				'second_team_bowling_player_3_score' => $this->input->post('second_team_bowling_player_3_score'),
				'second_team_bowling_player_3_overs' => $this->input->post('second_team_bowling_player_3_overs'),
				'winning_team_id' => $this->input->post('winning_team_id'),
				'won_by' => $this->input->post('won_by'),
				'player_of_the_match_id' => $this->input->post('player_of_the_match_id'),
				'player_of_the_match_score' => $this->input->post('player_of_the_match_score'),
				'player_of_the_match_balls' => $this->input->post('player_of_the_match_balls'),
				'player_of_the_match_4s' => $this->input->post('player_of_the_match_4s'),
				'player_of_the_match_6s' => $this->input->post('player_of_the_match_6s'),
				'player_of_the_match_bowling_score' => $this->input->post('player_of_the_match_bowling_score'),
				'player_of_the_match_overs' => $this->input->post('player_of_the_match_overs'),
				'player_of_the_match_bowling_4s' => $this->input->post('player_of_the_match_bowling_4s'),
				'player_of_the_match_bowling_6s' => $this->input->post('player_of_the_match_bowling_6s'),
				'created_date' => date('Y-m-d H:i:s')
			);

			if ($this->matches_model->insert_match_summary($match_summary)) {
				$this->session->set_flashdata('message', 'Added Successfully');
			} else {
				$this->session->set_flashdata('exception', 'Plase try again');
			}

			redirect('marketing_manager/matches/match_summary');
		}

		$data['tournaments'] = $this->matches_model->get_all_tournaments();
		$data['view'] = $this->load->view('marketing_manager/matches/add_match_summary', $data, true);
		$this->load->view('marketing_manager/template', $data);
	}
	public function edit_match_summary($id)
	{
		$data['title'] = 'Edit Matches Summary';

		if ($this->input->post('submit') === 'submit') {
			$match_summary = array(
				'tournament_id' => $this->input->post('tournament_id'),
				'pool_name' => $this->input->post('pool_name'),
				'first_team_id' => $this->input->post('first_team_id'),
				'first_team_score' => $this->input->post('first_team_score'),
				'first_team_wickets' => $this->input->post('first_team_wickets'),
				'first_team_overs_played' => $this->input->post('first_team_overs_played'),
				'first_team_batting_player_1_name' => $this->input->post('first_team_batting_player_1_name'),
				'first_team_batting_player_1_score' => $this->input->post('first_team_batting_player_1_score'),
				'first_team_batting_player_1_balls' => $this->input->post('first_team_batting_player_1_balls'),
				'first_team_batting_player_2_name' => $this->input->post('first_team_batting_player_2_name'),
				'first_team_batting_player_2_score' => $this->input->post('first_team_batting_player_2_score'),
				'first_team_batting_player_2_balls' => $this->input->post('first_team_batting_player_2_balls'),
				'first_team_batting_player_3_name' => $this->input->post('first_team_batting_player_3_name'),
				'first_team_batting_player_3_score' => $this->input->post('first_team_batting_player_3_score'),
				'first_team_batting_player_3_balls' => $this->input->post('first_team_batting_player_3_balls'),
				'first_team_bowling_player_1_name' => $this->input->post('first_team_bowling_player_1_name'),
				'first_team_bowling_player_1_score' => $this->input->post('first_team_bowling_player_1_score'),
				'first_team_bowling_player_1_balls' => $this->input->post('first_team_bowling_player_1_balls'),
				'first_team_bowling_player_2_name' => $this->input->post('first_team_bowling_player_2_name'),
				'first_team_bowling_player_2_score' => $this->input->post('first_team_bowling_player_2_score'),
				'first_team_bowling_player_2_balls' => $this->input->post('first_team_bowling_player_2_balls'),
				'first_team_bowling_player_3_name' => $this->input->post('first_team_bowling_player_3_name'),
				'first_team_bowling_player_3_score' => $this->input->post('first_team_bowling_player_3_score'),
				'first_team_bowling_player_3_balls' => $this->input->post('first_team_bowling_player_3_balls'),
				'second_team_id' => $this->input->post('second_team_id'),
				'second_team_score' => $this->input->post('second_team_score'),
				'second_team_wickets' => $this->input->post('second_team_wickets'),
				'second_team_overs_played' => $this->input->post('second_team_overs_played'),
				'second_team_batting_player_1_name' => $this->input->post('second_team_batting_player_1_name'),
				'second_team_batting_player_1_score' => $this->input->post('second_team_batting_player_1_score'),
				'second_team_batting_player_1_balls' => $this->input->post('second_team_batting_player_1_balls'),
				'second_team_batting_player_2_name' => $this->input->post('second_team_batting_player_2_name'),
				'second_team_batting_player_2_score' => $this->input->post('second_team_batting_player_2_score'),
				'second_team_batting_player_2_balls' => $this->input->post('second_team_batting_player_2_balls'),
				'second_team_batting_player_3_name' => $this->input->post('second_team_batting_player_3_name'),
				'second_team_batting_player_3_score' => $this->input->post('second_team_batting_player_3_score'),
				'second_team_batting_player_3_balls' => $this->input->post('second_team_batting_player_3_balls'),
				'second_team_bowling_player_1_name' => $this->input->post('second_team_bowling_player_1_name'),
				'second_team_bowling_player_1_score' => $this->input->post('second_team_bowling_player_1_score'),
				'second_team_bowling_player_1_overs' => $this->input->post('second_team_bowling_player_1_overs'),
				'second_team_bowling_player_2_name' => $this->input->post('second_team_bowling_player_2_name'),
				'second_team_bowling_player_2_score' => $this->input->post('second_team_bowling_player_2_score'),
				'second_team_bowling_player_2_overs' => $this->input->post('second_team_bowling_player_2_overs'),
				'second_team_bowling_player_3_name' => $this->input->post('second_team_bowling_player_3_name'),
				'second_team_bowling_player_3_score' => $this->input->post('second_team_bowling_player_3_score'),
				'second_team_bowling_player_3_overs' => $this->input->post('second_team_bowling_player_3_overs'),
				'winning_team_id' => $this->input->post('winning_team_id'),
				'won_by' => $this->input->post('won_by'),
				'player_of_the_match_id' => $this->input->post('player_of_the_match_id'),
				'player_of_the_match_score' => $this->input->post('player_of_the_match_score'),
				'player_of_the_match_balls' => $this->input->post('player_of_the_match_balls'),
				'player_of_the_match_4s' => $this->input->post('player_of_the_match_4s'),
				'player_of_the_match_6s' => $this->input->post('player_of_the_match_6s'),
				'player_of_the_match_bowling_score' => $this->input->post('player_of_the_match_bowling_score'),
				'player_of_the_match_overs' => $this->input->post('player_of_the_match_overs'),
				'player_of_the_match_bowling_4s' => $this->input->post('player_of_the_match_bowling_4s'),
				'player_of_the_match_bowling_6s' => $this->input->post('player_of_the_match_bowling_6s'),
				'created_date' => date('Y-m-d H:i:s')
			);

			if ($this->matches_model->update_match_summary($match_summary,$id)) {
				$this->session->set_flashdata('message', 'Updated Successfully');
			} else {
				$this->session->set_flashdata('exception', 'Plase try again');
			}

			redirect('marketing_manager/matches/match_summary');
		}
		$data['match_summary'] = $this->matches_model->get_match_summary_by_id($id);
		$data['tournaments'] = $this->matches_model->get_all_tournaments();
		$data['view'] = $this->load->view('marketing_manager/matches/edit_match_summary', $data, true);
		$this->load->view('marketing_manager/template', $data);
	}

	public function view_match_summary($match_summary_id)
	{
		$data['match_summary'] = $this->matches_model->get_match_summary_by_id($match_summary_id);
		$this->load->view('marketing_manager/matches/view_match_summary', $data);
	}
	public function delete_match_summary($id)
	{
		if ($this->matches_model->delete_match_summary($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		redirect('marketing_manager/matches/match_summary');
	}

	/*
	 * AJAX Functions
	 */

	public function get_teams_by_tournament_id()
	{
		$tournament_id = $this->input->post('tournament_id');
		$teams = $this->matches_model->get_teams_by_tournament_id($tournament_id);

		$response = '';
		if ($teams != null) {
			$response = '<option value="">Select Team</option>';
			foreach ($teams as $team) {
				$response .= '<option value="' . $team->id . '">' . $team->company_name . '</option>';
			}
		} else {
			$response = '<option value="">No Team Found</option>';
		}

		echo $response;
	}

	public function get_players_by_team_id()
	{
		$team_id = $this->input->post('team_id');
		$players = $this->matches_model->get_players_by_team_id($team_id);

		$response = '';
		if ($players != null) {
			$response = '<option value="">Select Player</option>';
			foreach ($players as $player) {
				$response .= '<option value="' . $player->id . '">' . $player->player_name . '</option>';
			}
		} else {
			$response = '<option value="">No Players Found</option>';
		}

		echo $response;
	}
}
