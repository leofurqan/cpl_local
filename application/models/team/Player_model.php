<?php defined('BASEPATH') or exit('No direct script access allowed');

class Player_model extends CI_Model
{
	private $table_players = 'players';
	private $table_playing_status = 'player_playing_status';
	private $table_batting_style = 'player_batting_style';
	private $table_bowling_style = 'player_bowling_style';
	private $table_kit_size = 'player_kit_size';
	private $table_player_roles = 'player_role';
	private $table_match_player_mapping  = 'match_player_mapping ';
	private $table_tournament_player_mapping = 'tournament_player_mapping';

	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';

	private $table_matches = 'matches';

	public function add_player($data)
	{
		return $this->db->insert($this->table_players, $data);
	}

	public function add_playing_status($data)
	{
		return $this->db->insert($this->table_playing_status, $data);
	}

	public function add_batting_style($data)
	{
		return $this->db->insert($this->table_batting_style, $data);
	}

	public function add_bowling_style($data)
	{
		return $this->db->insert($this->table_bowling_style, $data);
	}

	public function add_kit_size($data)
	{
		return $this->db->insert($this->table_kit_size, $data);
	}

	public function get_player_by_team_id()
	{
		return $this->db->select('players.id, players.player_name, players.image, players.email, players.contact, players.status,players.is_verified, player_playing_status.name as playing_status')->from($this->table_players)
			->join($this->table_playing_status, 'players.playing_status = player_playing_status.id')
			->where('team_id', $this->session->userdata('cpl')['team_id'])
			->order_by('status', 'desc')
			->order_by('id', 'desc')
			->get()
			->result();
	}

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

	public function get_all_player_roles()
	{
		return $this->db->select('*')->from($this->table_player_roles)->get()->result();
	}

	public function get_player_by_id($id)
	{
		return $this->db->select('*')->from($this->table_players)->where('id',$id)->get()->row();
	}


	public function update_player($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_players, $data);

	}

	public function update_playing_status($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_playing_status, $data);
	}

	public function update_batting_style($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_batting_style, $data);
	}

	public function update_bowling_style($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_bowling_style, $data);
	}

	public function update_kit_size($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_kit_size, $data);
	}

	public function delete_player($id)
	{
		return $this->db->where('id', $id)->delete($this->table_players);
	}

	public function check_email($email)
	{
		return $this->db->query('SELECT * FROM (SELECT email FROM clubs UNION SELECT email FROM officials UNION SELECT email FROM grounds  UNION SELECT email FROM user) as email where email = "' . $email . '"')->result();

	}

	public function check_contact($contact)
	{
		return $this->db->query('SELECT * FROM (SELECT contact FROM clubs UNION SELECT contact FROM officials UNION SELECT contact FROM grounds  UNION SELECT contact FROM user) as contact where contact = "' . $contact . '"')->result();
	}

	public function check_shirt_number($shirt_number)
	{
		return $this->db->select('*')->from($this->table_players)
			->where('team_id', $this->session->userdata('cpl')['team_id'])
			->where('shirt_number', $shirt_number)
			->get();
	}
	public function change_password($password,$id)
	{
		return $this->db->where('id', $id)->update($this->table_players, $password);
	}

	public function get_player_matches_count_by_id($id)
	{
		return $this->db->select('count(*) as match_count')
			->from($this->table_match_player_mapping)
			->where('player_id',$id)
			->get()->row()->match_count;
	}

	public function get_player_total_score_by_id($id)
	{
		return $this->db->select('SUM(batsman_score.runs_scored) as batsman_score')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score,
				'ball_by_ball.match_id = batsman_score.match_id 
			and ball_by_ball.innings_no = batsman_score.innings_no 
			and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.striker', $id)
			->get()->row()->batsman_score;
	}

	public function get_player_tournaments_count_by_id($id)
	{
		return $this->db->select('count(*) as tournament_count')
			->from($this->table_tournament_player_mapping)
			->where('player_id',$id)->get()->row()->tournament_count;
	}

	public function get_wickets_by_player_id($bowler_id)
	{
		return $this->db->select('count(*) as wickets')
			->from($this->table_ball_by_ball)
			->join($this->table_match_wickets,
				'ball_by_ball.match_id = match_wickets.match_id 
			and ball_by_ball.innings_no = match_wickets.innings_no
			 and ball_by_ball.over_id = match_wickets.over_id 
			 and ball_by_ball.ball_id = match_wickets.ball_id')
			->where('ball_by_ball.bowler', $bowler_id)->get()->row()->wickets;
	}

	public function get_man_of_match_by_player_id($id)
	{
		return $this->db->select('count(*) as man_of_match_count')
			->from($this->table_matches)
			->where('man_of_the_match',$id)
			->get()->row()->man_of_match_count;
	}

	public function get_player_overs_count_by_id($player_id)
	{
		$balls = $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_batsman_score, 'ball_by_ball.match_id = batsman_score.match_id AND ball_by_ball.innings_no = batsman_score.innings_no AND ball_by_ball.over_id = batsman_score.over_id AND ball_by_ball.ball_id = batsman_score.ball_id')
			->where('ball_by_ball.striker', $player_id)
			->get()->row()->balls;

		$extra_balls = $this->db->select('count(*) as balls')
			->from($this->table_ball_by_ball)
			->join($this->table_extra_runs, 'ball_by_ball.match_id = extra_runs.match_id 
				and ball_by_ball.innings_no = extra_runs.innings_no
				and ball_by_ball.over_id = extra_runs.over_id 
				and ball_by_ball.ball_id = extra_runs.ball_id
			 	and (extra_runs.extra_type_id = 1 or extra_runs.extra_type_id = 2)', 'left')
			->where('ball_by_ball.striker', $player_id)
			->where('extra_runs.match_id is not null')
			->get()->row()->balls;

		return $balls + $extra_balls;
	}

}
