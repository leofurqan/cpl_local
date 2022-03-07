<?php

class Dashboard_model extends CI_Model
{
	private $table_team = 'teams';
	private $table_ground = 'grounds';
	private $table_tournament = 'tournaments';
	private $table_official = 'officials';
	private $table_player = 'players';
	private $table_matches = 'matches';
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';

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

	public function get_batsman_score()
	{
		return $this->db->select('sum(batsman_score.runs_scored) as score')
			->from($this->table_batsman_score)
			->get()->row();
	}
	public function get_extra_score()
	{
		return $this->db->select('sum(extra_runs.extra_runs) as runs')
			->from($this->table_extra_runs)
			->get()->row();
	}

	public function get_total_wickets()
	{
		return $this->db->select('count(*) as wickets')
			->from($this->table_match_wickets)
			->get()->row();
	}
	public function get_four_runs()
	{
		return $this->db->select('count(*) as four')
			->from($this->table_batsman_score)
			->where('batsman_score.runs_scored = 4')
			->get()
			->row();
	}

	public function get_six_runs()
	{
		return $this->db->select('count(*) as six')
			->from($this->table_batsman_score)
			->where('batsman_score.runs_scored = 6')
			->get()
			->row();
	}
	public function get_no_of_hundreds()
	{
		return $this->db->select('count(batsman_score) as num_of_hundreds')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						group by striker
 						having batsman_score BETWEEN 100 and 199 ) as A')
			->get()->row();
	}
	public function get_no_of_fifties()
	{
		return $this->db->select('count(batsman_score) as num_of_fifties')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						group by striker
 						having batsman_score BETWEEN 50 and 99 ) as A')
			->get()->row();
	}

	public function get_max_score()
	{
		return $this->db->select('max(batsman_score) as max_score')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						group by striker) as A')
			->get()->row();
	}
	public function get_max_wickets()
	{
		return $this->db->select('max(match_wickets) as max_wickets')
			->from('(SELECT COUNT(match_wickets.player_id) as match_wickets from match_wickets
						 GROUP BY player_id
						 ) as A')
			->get()->row();
	}
}
