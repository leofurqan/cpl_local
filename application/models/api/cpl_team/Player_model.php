<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Player_model extends CI_Model
{
	private $table_players = 'players';
	private $table_player_playing_status = 'player_playing_status';

	public function getAllPlayersByTeamID($team_id)
	{
		return $this->db->select('players.id, players.player_name, players.status, player_playing_status.name as playing_status, players.image')
			->from($this->table_players)
			->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id')
			->where('players.team_id', $team_id)
			->get()
			->result();
	}

	public function getActivePlayersByTeamID($team_id)
	{
		return $this->db->select('players.id, players.player_name, players.status, player_playing_status.name as playing_status, players.image')
			->from($this->table_players)
			->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id')
			->where('players.team_id', $team_id)
			->where('players.status', 1)
			->get()
			->result();
	}

	public function getPlayerByEmail($email)
	{
		return $this->db->select('*')->from($this->table_players)->where('email', $email)->get();
	}

	public function getPlayerByPhone($phone)
	{
		return $this->db->select('*')->from($this->table_players)->where('contact', $phone)->get();
	}

	public function insertPlayer($data)
	{
		return $this->db->insert($this->table_players, $data);
	}

	public function getPlayerById($id)
	{
		return $this->db->select('*')
			->from($this->table_players)
			->where('id', $id)
			->get()
			->row();
	}

	public function edit_player($id, $data)
	{
		return $this->db->where('id', $id)->update($this->table_players, $data);
	}
}
