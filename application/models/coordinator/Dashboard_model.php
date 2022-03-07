<?php

class Dashboard_model extends CI_Model
{
	private $table_team = 'teams';
	private $table_ground = 'grounds';
	private $table_tournament = 'tournaments';
	private $table_official = 'officials';
	private $table_player = 'players';
	private $table_matches = 'matches';

	public function get_team_count()
	{
		return $this->db->select('count(*) as teams')->from($this->table_team)->get()->row();
	}

	public function get_ground_count()
	{
		return $this->db->select('count(*) as grounds')->from($this->table_ground)->get()->row();
	}

	public function get_official_count()
	{
		return $this->db->select('count(*) as officials')->from($this->table_official)->get()->row();
	}

	public function get_tournament_count()
	{
		return $this->db->select('count(*) as tournaments')->from($this->table_tournament)->get()->row();
	}

	public function get_live_tournament_count()
	{
		return $this->db->select('count(*) as live_tournaments')->from($this->table_tournament)->where('tournament_status', 1)->get()->row();
	}

	public function get_player_count()
	{
		return $this->db->select('count(*) as players')->from($this->table_player)->get()->row();
	}

	public function get_matches_count()
	{
		return $this->db->select('count(*) as matches')->from($this->table_matches)->get()->row();
	}

	public function get_live_matches_count()
	{
		return $this->db->select('count(*) as live_matches')->from($this->table_matches)->where('status', 1)->get()->row();
	}
}
