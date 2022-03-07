<?php

class Tournament_model extends CI_Model
{
	private $table_tournaments = 'tournaments';
	private $table_team_tournament_mapping = 'team_tournament_mapping';
	private $table_tournament_player_mapping = 'tournament_player_mapping';
	private $table_players = 'players';
	private $table_player_role = 'player_role';
	private $table_player_playing_status = 'player_playing_status';

	public function get_tournaments_list()
	{
		return $this->db->select('tournaments.id, tournaments.tournament_status, team_tournament_mapping.id as invitation_id, tournaments.logo, tournaments.tournament_name, tournaments.starting_date,tournaments.squad_submission_date, team_tournament_mapping.status as mapping_status')
			->from($this->table_team_tournament_mapping)
			->join('tournaments', 'team_tournament_mapping.tournament_id = tournaments.id')
			->where('team_id', $this->session->userdata('cpl')['team_id'])->get()->result();
	}

	public function get_tournament_by_id($tournament_id)
	{
		return $this->db->select('*')->from($this->table_tournaments)->where('id', $tournament_id)->get()->row();
	}

	public function get_tournament_players_by_team_id($team_id, $tournament_id)
	{
		return $this->db->select('tournament_player_mapping.player_id as id, tournament_player_mapping.shirt_number, tournament_player_mapping.role_id, players.player_name, players.image, player_role.role_name as player_role, player_playing_status.name as playing_status')
			->from($this->table_tournament_player_mapping)
			->join($this->table_players, 'tournament_player_mapping.player_id = players.id')
			->join($this->table_player_role, 'tournament_player_mapping.role_id = player_role.id')
			->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id')
			->where('tournament_player_mapping.tournament_id', $tournament_id)
			->where('tournament_player_mapping.team_id', $team_id)
			->get()
			->result();
	}
}
