<?php


class Overlay_model extends CI_Model
{
	private $table_matches = 'matches';
	private $table_teams = 'teams';
	private $table_innings = 'innings';
	private $table_players = 'players';
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';
	private $table_toss_decision = 'toss_decision';
	private $table_tournaments = 'tournaments';
	private $table_match_player_mapping = 'match_player_mapping';
	private $table_player_role = 'player_role';
	private $table_extra_type = 'extra_type';


	public function get_live_match($id)
	{
		return $this->db->select('*,matches.id as match_id,toss_winner_data.id as toss_winner_id, toss_winner_data.company_name as toss_winner_name')
			->from($this->table_matches)
			->join($this->table_tournaments, 'tournament_id = tournaments.id')
			->join('(SELECT id, company_name FROM teams) as toss_winner_data', 'matches.toss_winner =  toss_winner_data.id')
			->join($this->table_toss_decision, 'toss_decide = toss_decision.id')
			->where('matches.id', $id)
			->where('matches.status', 1)
			->get()
			->row();
	}

	public function get_innings_by_match_id($match_id)
	{
		return $this->db->select('*')->from($this->table_innings)
			->where('match_id', $match_id)
			->order_by('innings_no', 'desc')
			->get()->row();
	}

	public function get_team($team_id)
	{
		return $this->db->select('*')
			->from($this->table_teams)
			->where('id', $team_id)
			->get()->row();
	}

	public function get_team_players_by_id($match_id, $team_id)
	{
		return $this->db->select('*')
			->from($this->table_match_player_mapping)
			->join($this->table_players, 'match_player_mapping.player_id = players.id')
			->join($this->table_player_role, 'player_role.id = match_player_mapping.role_id')
			->where('players.team_id', $team_id)
			->where('match_id', $match_id)
			->get()->result();

	}


	public function get_data_from_innings($id)
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

	//team_score
	public function get_total_score_by_team_id($match_id, $team_id)
	{
		return $this->db->select('sum(batsman_score.runs_scored) as score')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score, 'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->get()->row();
	}

	public function get_extra_score_by_team_id($match_id, $team_id)
	{
		return $this->db->select('sum(extra_runs.extra_runs) as extra_score')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
			and extra_runs.innings_no = ball_by_ball.innings_no and extra_runs.over_id = ball_by_ball.over_id 
			and ball_by_ball.ball_id = extra_runs.ball_id')
			->where('ball_by_ball.match_id', $match_id)
			->where('ball_by_ball.team_batting', $team_id)
			->get()->row();
	}

	// wickets

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

	public function get_last_over_id($match_id, $innings_no, $bowler_id)
	{
		return $this->db->select('*')
			->from($this->table_ball_by_ball)
			->join('(select * from ball_by_ball where match_id =' . $match_id . ' and innings_no =' . $innings_no . ' and bowler =' . $bowler_id . ' group by over_id order by id desc limit 1) as ball'
				, 'ball_by_ball.over_id = ball.over_id and ball_by_ball.innings_no = ball.innings_no and ball_by_ball.bowler = ball.bowler')
			->get()->row();

	}

	public function get_last_over()
	{
		return $this->db->select('*')->from($this->table_ball_by_ball)->order_by('id', 'desc')->get()->row();
	}

	public function get_current_over_by_ball($match_id, $innings_no, $over_id)
	{
		return $this->db->select('*')
			->from($this->table_ball_by_ball)
			->where('match_id', $match_id)
			->where('innings_no', $innings_no)
			->where('over_id', $over_id)
			->get()->result();
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
			->where('extra_runs.match_id IS NOT NULL', null, false)
			->where('ball_by_ball.match_id', $match_id)
			->get()->row();

	}


	// bowler maiden


	// team_score

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


	public function get_last_wicket($match_id, $inning_no)
	{
		return $this->db->select('*')
			->from($this->table_match_wickets)
			->where('match_id', $match_id)
			->where('innings_no', $inning_no)
			->order_by('id', 'desc')
			->get()->row();
	}

	public function get_wicket_by_over($match_id, $innings_no, $over_id, $ball_id)
	{
		return $this->db->select('*')->from($this->table_match_wickets)
			->where('match_id', $match_id)
			->where('innings_no', $innings_no)
			->where('over_id', $over_id)
			->where('ball_id', $ball_id)
			->get()->row();
	}

	public function get_extra_by_over($match_id, $innings_no, $over_id, $ball_id)
	{
		return $this->db->select('*,sum(extra_runs) as extra_runs,count(*) as count')->from($this->table_extra_runs)
			->where('match_id', $match_id)
			->where('innings_no', $innings_no)
			->where('over_id', $over_id)
			->where('ball_id', $ball_id)
			->get()->row();
	}

	public function get_batsman_score_by_over($match_id, $innings_no, $over_id, $ball_id)
	{
		return $this->db->select('*')->from($this->table_batsman_score)
			->where('match_id', $match_id)
			->where('innings_no', $innings_no)
			->where('over_id', $over_id)
			->where('ball_id', $ball_id)
			->get()->row();
	}


}
