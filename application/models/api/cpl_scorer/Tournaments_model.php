<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tournaments_model extends CI_Model
{
	private $table_tournaments = "tournaments";
	private $table_tournament_player_mapping = "tournament_player_mapping";
	private $table_players = "players";
	private $table_player_role = "player_role";
	private $table_player_playing_status = "player_playing_status";

	public function getTournamentSquadByTeamID($team_id, $tournament_id)
	{
		return $this->db->select('tournament_player_mapping.player_id as player_id, tournament_player_mapping.team_id as team_id, tournament_player_mapping.shirt_number, tournament_player_mapping.role_id, players.player_name, players.image, player_role.role_name as player_role, player_playing_status.name as playing_status')
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
