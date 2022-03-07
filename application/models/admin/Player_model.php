<?php defined('BASEPATH') or exit('No direct script access allowed');

class Player_model extends CI_Model
{
	private $table_players = 'players';
	private $table_playing_status = 'player_playing_status';

	public function get_player_by_team_id($team_id)
	{
		return $this->db->select('players.id, players.player_name, players.image, players.email, players.contact, players.status, player_playing_status.name as playing_status')->from($this->table_players)
			->join($this->table_playing_status, 'players.playing_status = player_playing_status.id')
			->where('team_id', $team_id)
			->where('status', 1)
			->order_by('status', 'desc')->order_by('id', 'desc')
			->get()
			->result();
	}

	public function get_player_by_id($id)
	{
		return $this->db->select('*')->from($this->table_players)->where('id', $id)->get()->row();
	}
}
