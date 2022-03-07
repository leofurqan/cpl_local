<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Matches_model extends CI_Model
{
	private $table_matches = "matches";
	private $table_tournaments = "tournaments";
	private $table_grounds = "grounds";
	private $table_tournament_player_mapping = "tournament_player_mapping";
	private $table_match_player_mapping = "match_player_mapping";
	private $table_players = "players";
	private $table_player_role = "player_role";
	private $table_player_playing_status = "player_playing_status";
	private $table_clubs = "clubs";
	private $table_time_slots = "time_slots";
	private $table_officials = "officials";

	function getUpComingMatchesByTeamID($team_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.display_name as first_team_display_name, second_team.display_name as second_team_display_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, time_slots.starting_time as match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_time_slots, 'matches.match_time = time_slots.id')
			->where('matches.status', 0)
			->where('first_team_id', $team_id)
			->or_where('second_team_id', $team_id)
			->get()
			->result();
	}

	function getUpComingMatchesByPlayerID($player_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.display_name as first_team_display_name, second_team.display_name as second_team_display_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, time_slots.starting_time as match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_match_player_mapping, 'matches.id = match_player_mapping.match_id')
			->join($this->table_time_slots, 'matches.match_time = time_slots.id')
			->where('matches.status', 0)
			->where('match_player_mapping.player_id', $player_id)
			->get()
			->result();
	}

	function getMatchesByTeamID($team_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.display_name as first_team_display_name, second_team.display_name as second_team_display_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, time_slots.starting_time as match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_time_slots, 'matches.match_time = time_slots.id')
			->where('first_team_id', $team_id)
			->or_where('second_team_id', $team_id)
			->get()
			->result();
	}

	function getMatchesByPlayerID($player_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.display_name as first_team_display_name, second_team.display_name as second_team_display_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, time_slots.starting_time as match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_match_player_mapping, 'matches.id = match_player_mapping.match_id')
			->join($this->table_time_slots, 'matches.match_time = time_slots.id')
			->where('match_player_mapping.player_id', $player_id)
			->get()
			->result();
	}

	function getMatchesByTournamentID($tournament_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.display_name as first_team_display_name, second_team.display_name as second_team_display_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, time_slots.starting_time as match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, display_name, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_time_slots, 'matches.match_time = time_slots.id')
			->where('matches.tournament_id', $tournament_id)
			->get()
			->result();
	}

	function getMatchByID($match_id)
	{
		return $this->db->select('*')->from($this->table_matches)->where('id', $match_id)->get()->row();
	}

	function getMatchSquadByTeamID($match_id, $team_id, $tournament_id)
	{
		return $this->db->select('match_player_mapping.player_id, match_player_mapping.role_id, players.player_name, players.image, player_role.role_name as player_role, tournament_player_mapping.shirt_number, player_playing_status.name as playing_status')
			->from($this->table_match_player_mapping)
			->join($this->table_tournament_player_mapping, 'tournament_player_mapping.player_id = match_player_mapping.player_id')
			->join($this->table_players, 'match_player_mapping.player_id = players.id')
			->join($this->table_player_role, 'match_player_mapping.role_id = player_role.id')
			->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id')
			->where('match_player_mapping.match_id', $match_id)
			->where('match_player_mapping.team_id', $team_id)
			->where('tournament_player_mapping.tournament_id', $tournament_id)
			->get()
			->result();
	}

	function deleteMatchPlayers($match_id, $team_id)
	{
		return $this->db->where('match_id', $match_id)->where('team_id', $team_id)->delete($this->table_match_player_mapping);
	}

	function insertMatchPlayer($match_player)
	{
		return $this->db->insert($this->table_match_player_mapping, $match_player);
	}

	function get_match_by_id($id)
	{
		return $this->db->select('club_name ,toss_winner_data.company_name as toss_winner, grounds.ground_name, matches.match_date, starting_time as match_time, match_winner_data.company_name as match_winner ,match_overs, first_umpire_data.full_name as first_umpire , second_umpire_data.full_name as second_umpire , third_umpire_data.full_name as third_umpire ,coordinator_data.full_name as coordinator_name ')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join($this->table_clubs, 'tournaments.club_id = clubs.id')
			->join('(SELECT id, company_name,display_name FROM teams) as toss_winner_data', 'matches.toss_winner =  toss_winner_data.id')
			->join('(SELECT id, company_name,display_name FROM teams) as match_winner_data', 'matches.match_winner  =  match_winner_data.id')
			->join('(SELECT id,full_name FROM officials) as first_umpire_data', 'matches.first_umpire_id  =  first_umpire_data.id')
			->join('(SELECT id,full_name FROM officials) as second_umpire_data', 'matches.second_umpire_id  =  second_umpire_data.id')
			->join('(SELECT id,full_name FROM officials) as third_umpire_data', 'matches.third_umpire_id  =  third_umpire_data.id')
			->join('(SELECT id,full_name FROM officials) as coordinator_data', 'matches.coordinator_id  =  coordinator_data.id')
			->join($this->table_time_slots, 'matches.match_time = time_slots.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->where('matches.id', $id)
			->get()
			->row();
	}
}
