<?php

class Dashboard_model extends CI_Model {
	private $table_player = 'players';
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';
	private $table_matches = 'matches';



	public function get_player_count() {
		return $this->db->select('count(*) as players')->from($this->table_player)->get()->row();
	}
	public function get_player_by_id()
	{
		return $this->db->select('*')->from($this->table_player)->where('id', $this->session->userdata('cpl')['player_id'])->get()->row();
	}

	public function get_match_count(){
		return $this->db->query('select (select count(*) from match_player_mapping where player_id = "' . $this->session->userdata('cpl')['player_id'] . '") as matches_count')->row()->matches_count;
	}


	public function get_man_of_match_count($id)
	{
		return $this->db->select('count(man_of_the_match) as man_of_match_count')
			->from($this->table_matches)
			->where('man_of_the_match',$id)
			->get()->row();
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

	public function get_four_runs_by_player_id($id)
	{
		return $this->db->select('count(*) as four')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.striker', $id)
			->where('batsman_score.runs_scored ', 4)
			->get()->row();
	}

	public function get_six_runs_by_player_id($id)
	{
		return $this->db->select('count(*) as six')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.striker', $id)
			->where('batsman_score.runs_scored ', 6)
			->get()->row();
	}

}
