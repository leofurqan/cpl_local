<?php defined('BASEPATH') or exit('No direct script access allowed');


class Player_model extends CI_Model
{
	private $table_players = 'players';
	private $table_playing_status = 'player_playing_status';
	private $table_batting_style = 'player_batting_style';
	private $table_bowling_style = 'player_bowling_style';
	private $table_kit_size = 'player_kit_size';


	public function get_all_playing_status()
	{
		return $this->db->select('*')->from($this->table_playing_status)->get()->result();
	}

	public function get_all_batting_style()
	{
		return $this->db->select('*')->from($this->table_batting_style)->get()->result();
	}

	public function get_all_bowling_style()
	{
		return $this->db->select('*')->from($this->table_bowling_style)->get()->result();
	}

	public function get_all_kit_size()
	{
		return $this->db->select('*')->from($this->table_kit_size)->get()->result();
	}

	public function get_player_by_id($id)
	{
		return $this->db->select('*')->from($this->table_players)->where('id', $id)->get()->row();
	}

	public function check_email($email)
	{
		return $this->db->select('*')->from($this->table_players)->where('email', $email)->get();
	}

	public function check_contact($contact)
	{
		return $this->db->select('*')->from($this->table_players)->where('contact', $contact)->get();
	}

	public function check_cnic($cnic)
	{
		return $this->db->select('*')->from($this->table_players)->where('cnic', $cnic)->get();
	}



}
