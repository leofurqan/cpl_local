<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Scoring_model extends CI_Model
{
	private $table_match_innings = 'innings';
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_extra_runs = 'extra_runs';
	private $table_batsman_score = 'batsman_score';
	private $table_match_wickets = "match_wickets";
	private $table_match_results = "match_result";
	private $table_innings = "innings";
	private $table_penalty_types = "penalty_types";
	private $table_penalties = "penalties";
	private $table_events = 'events';

	public function getMatchInningsByMatchID($match_id)
	{
		return $this->db->select('*')->from($this->table_match_innings)->where('match_id', $match_id)->get();
	}

	public function ball_by_ball($data)
	{
		return $this->db->insert($this->table_ball_by_ball, $data);
	}

	public function get_ball_by_ball($match_id, $innings_no, $over_id, $ball_id)
	{
		return $this->db->select('*')
			->from($this->table_ball_by_ball)
			->where('match_id', $match_id)
			->where('over_id', $over_id)
			->where('ball_id', $ball_id)
			->where('innings_no', $innings_no)
			->get()->row();
	}

	public function del_ball_by_ball($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_ball_by_ball);

	}

	public function extra_runs($data)
	{
		return $this->db->insert($this->table_extra_runs, $data);
	}

	public function get_extra_runs($match_id, $innings_no, $over_id, $ball_id, $extra_type_id)
	{
		return $this->db->select('*')
			->from($this->table_extra_runs)
			->where('match_id', $match_id)
			->where('over_id', $over_id)
			->where('ball_id', $ball_id)
			->where('innings_no', $innings_no)
			->where('extra_type_id', $extra_type_id)
			->get()->row();
	}

	public function del_extra_runs($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_extra_runs);
	}


	public function add_batsman_score($data)
	{
		return $this->db->insert($this->table_batsman_score, $data);
	}

	public function get_batsman_score($match_id, $innings_no, $over_id, $ball_id)
	{
		return $this->db->select('*')
			->from($this->table_batsman_score)
			->where('match_id', $match_id)
			->where('over_id', $over_id)
			->where('ball_id', $ball_id)
			->where('innings_no', $innings_no)
			->get()->row();
	}

	public function del_batsman_score($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_batsman_score);
	}


	public function add_wicket($data)
	{
		return $this->db->insert($this->table_match_wickets, $data);
	}

	public function get_wicket($match_id, $innings_no, $over_id, $ball_id)
	{
		return $this->db->select('*')
			->from($this->table_match_wickets)
			->where('match_id', $match_id)
			->where('over_id', $over_id)
			->where('ball_id', $ball_id)
			->where('innings_no', $innings_no)
			->get()->row();
	}

	public function del_wicket($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_match_wickets);
	}

	//match_result_table_data

	public function add_match_result($data)
	{
		return $this->db->insert($this->table_match_results, $data);
	}

	public function get_wickets_by_team_id($match_id, $team_id)
	{
		return $this->db->select('count(*) as wickets')
			->from($this->table_ball_by_ball)
			->join($this->table_match_wickets, 'ball_by_ball.Match_Id = match_wickets.Match_Id 
			and ball_by_ball.innings_no = match_wickets.innings_no and ball_by_ball.over_id = match_wickets.over_id 
			and ball_by_ball.ball_id = match_wickets.ball_id ')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->get()->row();
	}

	public function get_total_score_by_team_id($match_id, $team_id)
	{
		return $this->db->select('sum(batsman_score.runs_scored) as score')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score, 'ball_by_ball.Match_Id = batsman_score.Match_Id 
			and ball_by_ball.innings_no = batsman_score.innings_no and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id ')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->get()->row();
	}

	public function get_extra_score_by_team_id($match_id, $team_id)
	{
		return $this->db->select('sum(extra_runs.extra_runs) as score')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.Match_Id = extra_runs.Match_Id 
			and extra_runs.innings_no = ball_by_ball.innings_no and extra_runs.over_id = ball_by_ball.over_id 
			and ball_by_ball.ball_id = extra_runs.ball_id ')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->get()->row();
	}


	public function get_balls_by_team_id($match_id, $team_id)
	{
		return $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.Match_Id = extra_runs.Match_Id 
			and ball_by_ball.innings_no = extra_runs.innings_no and ball_by_ball.over_id = extra_runs.over_id 
			and ball_by_ball.ball_id = extra_runs.ball_id AND (extra_runs.Extra_Type_Id = 3 OR extra_runs.Extra_Type_Id = 4)', 'left')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->where('extra_runs.Match_Id', null)
			->get()->row();
	}

	//match_overlay

	public function add_innings_data($data)
	{
		return $this->db->insert($this->table_innings, $data);
	}

	public function update_innings_data($match_id, $innings_no, $data)
	{
		$this->db->where('match_id', $match_id);
		$this->db->where('innings_no', $innings_no);
		return $this->db->update($this->table_innings, $data);
	}

	public function delete_innings_data($match_id, $inning_id)
	{
		$this->db->where('match_id', $match_id);
		$this->db->where('innings_no', $inning_id);
		return $this->db->delete($this->table_innings);
	}

	public function get_last_row_by_match_id($match_id)
	{
		return $this->db->select('*')
			->from($this->table_ball_by_ball)
			->where('match_id', $match_id)
			->order_by('id', 'desc')
			->get()->row();
	}

	public function undo($match_id, $inning_no, $over_id, $ball_id)
	{
		$this->db->where('match_id', $match_id);
		$this->db->where('over_id', $over_id);
		$this->db->where('ball_id', $ball_id);
		$this->db->where('innings_no', $inning_no);
		$this->db->delete(array($this->table_ball_by_ball, $this->table_batsman_score, $this->table_match_wickets, $this->table_extra_runs));
		return $this->db->affected_rows();
	}

	public function get_last_bolwer_to_switch($match_id, $innings_no)
	{
		return $this->db->select('*')
			->from($this->table_ball_by_ball)
			->join("(select * from ball_by_ball where match_id=$match_id and innings_no = $innings_no 
					 group by over_id order by id desc limit 1) as ball", "ball_by_ball.over_id = ball.over_id and ball_by_ball.innings_no = ball.innings_no and ball_by_ball.bowler = ball.bowler")
			->get()->row();
	}

	public function update_ball_by_ball($over_id, $match_id, $innings_no, $bowler_id, $data)
	{
		$this->db->where('match_id', $match_id);
		$this->db->where('innings_no', $innings_no);
		$this->db->where('over_id', $over_id);
		$this->db->where('bowler', $bowler_id);
		return $this->db->update($this->table_ball_by_ball, $data);
	}


	public function get_all_penalties_types()
	{
		return $this->db->select('*')
			->from($this->table_penalty_types)
			->get()->result();
	}

	public function add_penalty($data)
	{
		return $this->db->insert($this->table_penalties, $data);
	}

	public function add_events($data)
	{
		return $this->db->insert($this->table_events, $data);
	}
}
