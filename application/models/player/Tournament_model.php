<?php


class Tournament_model extends CI_Model
{

	private $table_tournaments = 'tournaments';
	private $table_tournament_player_mapping = 'tournament_player_mapping';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';
	private $table_matches= 'matches';

	public function get_all_live_tournaments($id)
	{
		return $this->db->select('tournaments.*, clubs.club_name')->from($this->table_tournaments)
			->join('clubs', 'tournaments.club_id = clubs.id')
			->join($this->table_tournament_player_mapping,'tournament_player_mapping.player_id = '.$id)
			->where('tournament_status', 1)
			->order_by('id', 'desc')->get()->result();
	}
	public function get_all_tournaments($id)
	{
		return $this->db->select('tournaments.*, clubs.club_name')->from($this->table_tournaments)
			->join('clubs', 'tournaments.club_id = clubs.id')
			->join($this->table_tournament_player_mapping,'tournament_player_mapping.player_id = '.$id)
			->order_by('id', 'desc')->get()->result();
	}
	public function get_tournament_by_id($id)
	{
		return $this->db->select('*')->from($this->table_tournaments)->where('id', $id)->get()->row();
	}

	public function get_batsman_score_by_tournament_id($id)
	{
		return $this->db->select('sum(batsman_score.runs_scored) as score')->from($this->table_matches)
			->join($this->table_batsman_score, 'matches.id = batsman_score.match_id')
			->where('matches.tournament_id', $id)
			->get()
			->row()
			->score;
	}

	public function get_extra_runs_tournament_id($id)
	{
		return $this->db->select('sum(extra_runs.extra_runs) as runs')->from($this->table_matches)
			->join($this->table_extra_runs, 'matches.id = extra_runs.match_id')
			->where('matches.tournament_id', $id)
			->get()
			->row()
			->runs;
	}

	public function get_wickets_by_tournament_id($id)
	{
		return $this->db->select('count(*) as wickets')->from($this->table_matches)
			->join($this->table_match_wickets, 'matches.id = match_wickets.match_id')
			->where('matches.tournament_id', $id)
			->get()
			->row()
			->wickets;
	}

	public function get_four_runs_tournament_id($id)
	{
		return $this->db->select('count(*) as fours')->where('batsman_score.runs_scored = 4')->from($this->table_matches)
			->join($this->table_batsman_score, 'matches.id = batsman_score.match_id')
			->where('matches.tournament_id', $id)
			->get()
			->row()
			->fours;
	}

	public function get_six_runs_tournament_id($id)
	{
		return $this->db->select('count(*) as six')->where('batsman_score.runs_scored = 6')->from($this->table_matches)
			->join($this->table_batsman_score, 'matches.id = batsman_score.match_id')
			->where('matches.tournament_id', $id)
			->get()
			->row()
			->six;
	}

	public function get_no_of_hundreds_by_tournament_id($id)
	{
		return $this->db->select('count(batsman_score) as num_of_hundreds')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `matches`
						JOIN `batsman_score` ON `batsman_score`.`match_id` = `matches`.`id`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						WHERE `matches`.`tournament_id`='.$id.'
 						group by striker
 						having batsman_score BETWEEN 100 and 199 ) as A')
			->get()->row();
	}
	public function get_no_of_fifties_by_tournament_id($id)
	{
		return $this->db->select('count(batsman_score) as num_of_fifties')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `matches`
						JOIN `batsman_score` ON `batsman_score`.`match_id` = `matches`.`id`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						WHERE `matches`.`tournament_id`='.$id.'
 						group by striker
 						having batsman_score BETWEEN 50 and 99 ) as A')
			->get()->row();
	}
	public function get_max_score_by_tournament_id($id)
	{
		return $this->db->select('max(batsman_score) as max_score')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `matches`
						JOIN `batsman_score` ON `batsman_score`.`match_id` = `matches`.`id`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						WHERE `matches`.`tournament_id`='.$id.'
 						group by striker) as A')
			->get()->row();
	}
	public function get_max_wickets_by_tournament_id($id)
	{
		return $this->db->select('max(match_wickets) as max_wickets')
			->from('(SELECT COUNT(match_wickets.player_id) as match_wickets from match_wickets 
						JOIN matches ON matches.id = match_wickets.match_id
						WHERE `matches`.`tournament_id`='.$id.'
						 GROUP BY player_id
						 ) as A')
			->get()->row();
	}


}
