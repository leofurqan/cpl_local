<?php


class Matches_model extends CI_Model
{

	private  $table_matches = 'matches';
	private $table_tournaments = 'tournaments';
	private $table_grounds = 'grounds';
	private $table_time_slots = 'time_slots';
	private $table_match_player_mapping = 'match_player_mapping';
	private $table_tournament = 'tournaments';
	private $table_toss_decision = 'toss_decision';

	private $table_innings = 'innings';
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';



	public function get_all_live_matches($id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time,time_slots.starting_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_match_player_mapping,'match_player_mapping.player_id = '.$id)
			->join($this->table_time_slots, 'time_slots.id = matches.match_time')
			->where('matches.status',1)
			->get()
			->result();
	}
	public function get_all_matches($id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time,time_slots.starting_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_match_player_mapping,'match_player_mapping.player_id = '.$id)
			->join($this->table_time_slots, 'time_slots.id = matches.match_time')
			->get()
			->result();
	}


	public function get_match_by_id($match_id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name,tournaments.logo, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournament, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->where('matches.status', 0)
			->where('matches.id', $match_id)
			->get()
			->row();
	}
	public function get_live_match($id)
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id,
		 		first_team.company_name as first_team_name, second_team.company_name as second_team_name,
		 		 first_team.logo as first_team_logo, second_team.logo as second_team_logo, 
		 		  matches.match_date, matches.match_time, matches.status,toss_name,toss_decide,
		 		  toss_winner_data.id as toss_winner_id, toss_winner_data.company_name as toss_winner_name')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as toss_winner_data', 'matches.toss_winner =  toss_winner_data.id')
			->join($this->table_toss_decision, 'toss_decide = toss_decision.id')
			->where('matches.status', 1)
			->where('matches.id',$id)
			->get()
			->row();
	}

	public function get_match_data($id)
	{
		return $this->db->select('*,striker.id as striker_id,non_striker.id as non_striker_id,team_bowler.id as bowler_id,
				striker.player_name as striker_name,non_striker.player_name as non_striker_name,team_bowler.player_name as bowler_name')
			->from($this->table_innings)
			->join('(SELECT id, player_name FROM players) as striker', 'innings.facing_id = striker.id')
			->join('(SELECT id, player_name FROM players) as non_striker', 'innings.non_facing_id = non_striker.id')
			->join('(SELECT id, player_name FROM players) as team_bowler', 'innings.bowler = team_bowler.id')
			->where('match_id', $id)
			->order_by('innings_no', 'desc')
			->get()->row();
	}

	//bowler over
	public function get_bowler_count($match_id, $bowler_id)
	{
		return $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
				and ball_by_ball.innings_no = extra_runs.innings_no
				and ball_by_ball.over_id = extra_runs.over_id 
				and ball_by_ball.ball_id = extra_runs.ball_id
			 	and (extra_runs.extra_type_id = 3 or extra_runs.extra_type_id = 4)', 'left')
			->where('ball_by_ball.match_id', $match_id)
			->where('extra_runs.match_id', null)
			->where('ball_by_ball.bowler', $bowler_id)->get()->row();
	}

	// bowler wickets
	public function get_wickets_by_bowler_id($match_id, $bowler_id)
	{
		return $this->db->select('count(*) as wickets')
			->from($this->table_ball_by_ball)
			->join($this->table_match_wickets,
				'ball_by_ball.match_id = match_wickets.match_id 
      and ball_by_ball.innings_no = match_wickets.innings_no
       and ball_by_ball.over_id = match_wickets.over_id 
       and ball_by_ball.ball_id = match_wickets.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('match_wickets.wicket_type !=', 7)
			->where('match_wickets.wicket_type !=', 9)
			->where('match_wickets.wicket_type !=', 10)
			->where('match_wickets.wicket_type !=', 11)
			->where('ball_by_ball.bowler', $bowler_id)->get()->row();
	}

	//bowler score
	public function get_bowler_score($match_id, $bowler_id)
	{
		return $this->db->select('sum(batsman_score.runs_scored) as runs')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score, 'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.over_id = batsman_score.over_id and  ball_by_ball.ball_id = batsman_score.ball_id
			and ball_by_ball.innings_no = batsman_score.innings_no', 'inner')
			->where('ball_by_ball.bowler', $bowler_id)
			->where('ball_by_ball.match_id', $match_id)->get()->row();

	}
	public function get_bowler_extra_score($match_id, $bowler_id)
	{
		return $this->db->select('sum(extra_runs.extra_runs) as runs')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
			and ball_by_ball.over_id = extra_runs.over_id and  ball_by_ball.ball_id = extra_runs.ball_id
			and ball_by_ball.innings_no = extra_runs.innings_no
			and (extra_runs.extra_type_id  = 3 or extra_runs.extra_type_id = 4)', 'left')
			->where('ball_by_ball.bowler', $bowler_id)
			->where('extra_runs.match_id IS NOT NULL', null,false)
			->where('ball_by_ball.match_id', $match_id)
			->get()->row();
	}

	// bowler maiden
	public function maiden_over($match_id,$bowler_id)
	{
		return $this->db->select('count(*) as maiden_over')
			->from('(select a.over_id, SUM(b.runs_scored) as maiden from ball_by_ball as a 
			INNER JOIN batsman_score as b ON a.match_id = b.match_id AND a.innings_no = b.innings_no 
			AND a.over_id = b.over_id AND a.ball_id = b.ball_id 
			WHERE a.bowler ='.$bowler_id. ' AND a.match_id = ' .$match_id.' GROUP BY b.over_id HAVING COUNT(b.ball_id) = 6)')
			->where('maiden', 0)
			->get()->row();
	}


	// team_score
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
		return $this->db->select('sum(extra_runs.extra_runs) as extra_score')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.Match_Id = extra_runs.Match_Id 
			and extra_runs.innings_no = ball_by_ball.innings_no and extra_runs.over_id = ball_by_ball.over_id 
			and ball_by_ball.ball_id = extra_runs.ball_id ')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->get()->row();
	}

	public function get_wickets_by_team_id($match_id, $team_id)
	{
		return $this->db->select('count(*) as wickets')
			->from($this->table_ball_by_ball)
			->join($this->table_match_wickets,
				'ball_by_ball.match_id = match_wickets.match_id 
			and ball_by_ball.innings_no = match_wickets.innings_no
			 and ball_by_ball.over_id = match_wickets.over_id 
			 and ball_by_ball.ball_id = match_wickets.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->get()->row();
	}

	// team_overs

	public function get_valid_balls_count($match_id, $team_id)
	{
		return $this->db->select('count(*) as ball')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
				and ball_by_ball.innings_no = extra_runs.innings_no
				and ball_by_ball.over_id = extra_runs.over_id 
				and ball_by_ball.ball_id = extra_runs.ball_id
			 	and (extra_runs.extra_type_id = 3 or extra_runs.extra_type_id = 4)', 'left')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->where('extra_runs.match_id', null)
			->get()->row();
	}

	//player_score

	public function get_batsman_score($match_id, $player_id)
	{
		return $this->db->select('SUM(batsman_score.runs_scored) as batsman_score')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->get()->row();
	}


	// player_balls

	public function get_batsman_balls($match_id, $player_id)
	{
		$balls = $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score, 'ball_by_ball.match_id = batsman_score.match_id AND ball_by_ball.innings_no = batsman_score.innings_no AND ball_by_ball.over_id = batsman_score.over_id AND ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->get()->row()->balls;

		$extra_balls = $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
				and ball_by_ball.innings_no = extra_runs.innings_no
				and ball_by_ball.over_id = extra_runs.over_id 
				and ball_by_ball.ball_id = extra_runs.ball_id
			 	and (extra_runs.extra_type_id = 1 or extra_runs.extra_type_id = 2)', 'left')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->where('extra_runs.match_id is not null')
			->get()->row()->balls;

		return $balls + $extra_balls;
	}
	public function get_batsman_no_fours($match_id, $player_id)
	{
		return $this->db->select('count(*) as fours')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->where('batsman_score.runs_scored ', 4)
			->get()->row();
	}

	// 6s
	public function get_batsman_no_six($match_id, $player_id)
	{
		return $this->db->select('count(*) as six')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->where('batsman_score.runs_scored ', 6)
			->get()->row();
	}


	public function get_bowler_batsman_score($match_id, $player_id, $bowler_id)
	{
		return $this->db->select('sum(batsman_score.runs_scored) as batsman_score')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->where('ball_by_ball.bowler', $bowler_id)
			->get()->row();
	}

	public function get_bowler_balls_by_batsman($match_id, $player_id, $bowler_id)
	{
		$balls = $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score, 'ball_by_ball.match_id = batsman_score.match_id 
			AND ball_by_ball.innings_no = batsman_score.innings_no
			 AND ball_by_ball.over_id = batsman_score.over_id
			  AND ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->where('ball_by_ball.bowler', $bowler_id)
			->get()->row()->balls;

		$extra_balls = $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
				and ball_by_ball.innings_no = extra_runs.innings_no
				and ball_by_ball.over_id = extra_runs.over_id 
				and ball_by_ball.ball_id = extra_runs.ball_id
			 	and (extra_runs.extra_type_id = 1 or extra_runs.extra_type_id = 2)', 'left')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.striker', $player_id)
			->where('ball_by_ball.bowler', $bowler_id)
			->where('extra_runs.match_id is not null')
			->get()->row()->balls;

		return $balls + $extra_balls;

	}
}
