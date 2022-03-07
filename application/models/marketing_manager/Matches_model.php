<?php

class Matches_model extends CI_Model
{
	private $table_match_summary = 'match_summary';
	private $table_tournaments = 'tournaments';
	private $table_teams = 'teams';
	private $table_team_tournament_mapping = 'team_tournament_mapping';
	private $table_players = 'players';

	public function get_all_match_summary()
	{
		return $this->db->select('id, tournament_id, pool_name, first_team_id, second_team_id, created_date')->from($this->table_match_summary)->get()->result();
	}

	public function get_all_tournaments()
	{
		return $this->db->select('id, tournament_name')->from($this->table_tournaments)->get()->result();
	}

	public function get_teams_by_tournament_id($tournament_id)
	{
		return $this->db->select('teams.id, teams.company_name')->from($this->table_team_tournament_mapping)
			->join($this->table_teams, 'team_tournament_mapping.team_id = teams.id')
			->where('team_tournament_mapping.tournament_id', $tournament_id)
			->where('team_tournament_mapping.status', 1)
			->get()
			->result();
	}

	public function get_players_by_team_id($team_id)
	{
		return $this->db->select('players.id, players.player_name')->from($this->table_players)->where('team_id', $team_id)->get()->result();
	}

	public function insert_match_summary($data) {
		return $this->db->insert($this->table_match_summary, $data);
	}
	public function update_match_summary($data,$id) {
		return $this->db->where('id', $id)->update($this->table_match_summary, $data);
	}
	public function delete_match_summary($id)
	{
		return $this->db->where('id', $id)->delete($this->table_match_summary);
	}

	public function get_match_summary_by_id($id) {
		return $this->db->select('*')->from($this->table_match_summary)->where('id', $id)->get()->row();
	}
}
