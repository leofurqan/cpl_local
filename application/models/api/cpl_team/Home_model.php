<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
	private $table_team = 'teams';
	private $table_players = 'players';

	private $table_player = 'players';
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';
	private $table_matches = 'matches';
	private $table_team_player_mapping = 'team_player_mapping';

	public function getStatsByTeamID($id)
	{
		return $this->db->query('select (select count(*) from team_tournament_mapping where team_id = "' . $id . '" and status = 1) as tournament_count,
										(select count(*) from matches where first_team_id = "' . $id . '" or second_team_id = "' . $id . '") as matches_count,
        								(select count(*) from players where team_id = "' . $id . '") as players_count,
        								(select count(*) from matches where match_winner = "' . $id . '" AND status = 2) as wins_count,
        								(select count(*) from matches where match_winner != "' . $id . '" AND (first_team_id = "' . $id . '" OR second_team_id = "' . $id . '") AND status = 2) as lost_count')
			->row();
	}

	public function getStatsByPlayerID($id)
	{
		return $this->db->query('select (select count(*) from tournament_player_mapping where player_id = "' . $id . '") as tournament_count,
										(select count(*) from match_player_mapping where player_id = "' . $id . '") as matches_count')
			->row();
	}


	public function get_player_total_score($player_id)
	{
		return $this->db->select('SUM(batsman_score.runs_scored) as player_score')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.striker', $player_id)
			->get()
			->row()
			->player_score;
	}

	public function get_bowler_count($bowler_id)
	{
		return $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
				and ball_by_ball.innings_no = extra_runs.innings_no
				and ball_by_ball.over_id = extra_runs.over_id 
				and ball_by_ball.ball_id = extra_runs.ball_id
			 	and (extra_runs.extra_type_id = 3 or extra_runs.extra_type_id = 4)', 'left')
			->where('extra_runs.match_id', null)
			->where('ball_by_ball.bowler', $bowler_id)->get()->row()
			->balls;
	}

	public function get_wickets_by_bowler_id($bowler_id)
	{
		return $this->db->select('count(*) as wickets')
			->from($this->table_ball_by_ball)
			->join($this->table_match_wickets,
				'ball_by_ball.match_id = match_wickets.match_id 
			and ball_by_ball.innings_no = match_wickets.innings_no
			 and ball_by_ball.over_id = match_wickets.over_id 
			 and ball_by_ball.ball_id = match_wickets.ball_id')
			->where('match_wickets.wicket_type !=', 7)
			->where('match_wickets.wicket_type !=', 9)
			->where('match_wickets.wicket_type !=', 10)
			->where('match_wickets.wicket_type !=', 11)
			->where('ball_by_ball.bowler', $bowler_id)->get()->row()
			->wickets;
	}

	public function get_no_of_hundreds_by_player_id($id)
	{
		return $this->db->select('count(batsman_score) as num_of_hundreds')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						WHERE `ball_by_ball`.`striker`='.$id.'
 						group by striker
 						having batsman_score BETWEEN 100 and 199 ) as A')
			->get()->row();
	}
	public function get_no_of_fifties_by_player_id($id)
	{
		return $this->db->select('count(batsman_score) as num_of_fifties')
			->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 						JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 						and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 						and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 						and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 						WHERE `ball_by_ball`.`striker`='.$id.'
 						group by striker
 						having batsman_score BETWEEN 50 and 99 ) as A')
			->get()->row();
	}

	public function get_teams_by_player_id($id)
	{
		return $this->db->select('company_name,display_name,logo')
			->from($this->table_team)
			->join($this->table_team_player_mapping,'teams.id = team_player_mapping.team_id')
			->where('player_id',$id)
			->get()->result();
	}
}
