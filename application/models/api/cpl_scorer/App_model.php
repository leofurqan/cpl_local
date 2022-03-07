<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model
{
	private $table_extra_type = 'extra_type';
	private $table_match_abandon = 'match_abandon';
	private $table_match_outcome = 'match_outcome';
	private $table_penalty_type = 'penalty_types';
	private $table_batting_style = 'player_batting_style';
	private $table_bowling_style = 'player_bowling_style';
	private $table_playing_style = 'player_playing_status';
	private $table_player_role = 'player_role';
	private $table_toss_decision = 'toss_decision';
	private $table_wicket_type = 'wickets_type';
	private $table_win_type = 'win_type';

	public function getExtraTypes()
	{
		return $this->db->select('*')->from($this->table_extra_type)->get()->result();
	}

	public function getMatchAbandons()
	{
		return $this->db->select('*')->from($this->table_match_abandon)->get()->result();
	}

	public function getMatchOutcome()
	{
		return $this->db->select('*')->from($this->table_match_outcome)->get()->result();
	}

	public function getPenaltyTypes()
	{
		return $this->db->select('*')->from($this->table_penalty_type)->get()->result();
	}

	public function getBattingStyle()
	{
		return $this->db->select('*')->from($this->table_batting_style)->get()->result();
	}

	public function getBowlingStyle()
	{
		return $this->db->select('*')->from($this->table_bowling_style)->get()->result();
	}

	public function getPlayingStyle()
	{
		return $this->db->select('*')->from($this->table_playing_style)->get()->result();
	}

	public function getPlayerRole()
	{
		return $this->db->select('*')->from($this->table_player_role)->get()->result();
	}

	public function getTossDecision()
	{
		return $this->db->select('*')->from($this->table_toss_decision)->get()->result();
	}

	public function getWicketType()
	{
		return $this->db->select('*')->from($this->table_wicket_type)->get()->result();
	}

	public function getWinType()
	{
		return $this->db->select('*')->from($this->table_win_type)->get()->result();
	}
}
