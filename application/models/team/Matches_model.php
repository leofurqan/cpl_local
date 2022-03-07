<?php

class Matches_model extends CI_Model
{
	private $table_matches = 'matches';
	private $table_ground = 'grounds';
	private $table_tournament = 'tournaments';
	private $table_players = 'players';
	private $table_player_role = 'player_role';
	private $table_kitsize = 'player_kit_size';
	private $table_player_playing_status = 'player_playing_status';
	private $table_tournament_player_mapping = 'tournament_player_mapping';
	private $table_match_player_mapping = 'match_player_mapping';
	private $table_tournaments = 'tournaments';
	private $table_toss_decision = 'toss_decision';



	public function get_match_by_id($match_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name,tournaments.logo, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournament, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_ground, 'matches.ground_id = grounds.id')
			->where('matches.status', 0)
			->where('matches.id', $match_id)
			->get()
			->row();
	}

	public function get_match_team_list($team_id, $match_id)
	{
		return $this->db->select('match_player_mapping.player_id as id,match_player_mapping.match_id, match_player_mapping.role_id, players.player_name, players.image, player_role.role_name as player_role')
			->from($this->table_match_player_mapping)
			->join($this->table_players, 'match_player_mapping.player_id = players.id')
			->join($this->table_player_role, 'match_player_mapping.role_id = player_role.id')
			->where('match_player_mapping.match_id', $match_id)
			->where('match_player_mapping.team_id', $team_id)
			->get()
			->result();
	}

	public function get_list_of_matches_by_id($team_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournament, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_ground, 'matches.ground_id = grounds.id')
			->group_start()
			->where('first_team_id', $team_id)
			->or_where('second_team_id', $team_id)
			->group_end()
			->get()
			->result();
	}
	public function get_list_of_live_matches_by_id($team_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournament, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_ground, 'matches.ground_id = grounds.id')
			->group_start()
			->where('first_team_id', $team_id)
			->or_where('second_team_id', $team_id)
			->group_end()
			->where('matches.status', 1)
			->get()
			->result();
	}



	public function delete_match_player($match_id, $team_id)
	{
		return $this->db->where('match_id', $match_id)->where('team_id', $team_id)->delete($this->table_match_player_mapping);
	}

	public function insert_match_player($data)
	{
		return $this->db->insert($this->table_match_player_mapping, $data);
	}

	/* Ajax function */
	public function check_player($match_id, $team_id)
	{
		return $this->db->select('*')->from($this->table_match_player_mapping)
			->where('team_id', $team_id)
			->where('match_id', $match_id)
			->get()->result();
	}


	public function delete_player($match_id, $team_id)
	{
		$this->db->where('match_id', $match_id);
		$this->db->where('team_id', $team_id);
		return $this->db->Delete($this->table_match_player_mapping);
	}

	public function add_team($data)
	{
		return $this->db->insert($this->table_match_player_mapping, $data);
	}
}
