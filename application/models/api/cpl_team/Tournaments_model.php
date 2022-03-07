<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tournaments_model extends CI_Model
{
	private $table_tournaments = "tournaments";
	private $table_team_tournament_mapping = "team_tournament_mapping";
	private $table_clubs = "clubs";
	private $table_tournament_player_mapping = "tournament_player_mapping";
	private $table_players = "players";
	private $table_player_role = "player_role";
	private $table_player_playing_status = "player_playing_status";
	private $table_teams = "teams";
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';
	private $table_matches = 'matches';
	private $table_match_player_mapping = 'match_player_mapping';
	private $table_pools = 'pools';
	private $table_team_pool_mapping = 'team_pool_mapping';

	public function getTournamentsByTeamID($team_id)
	{
		return $this->db->select('tournaments.id, tournaments.tournament_name, tournaments.logo, tournaments.starting_date, tournaments.tournament_status, (SELECT count(*) from team_tournament_mapping where team_tournament_mapping.status = 2 AND tournaments.id = team_tournament_mapping.tournament_id) as team_count, tournaments.min_squad, tournaments.max_squad')
			->from($this->table_tournaments)
			->join($this->table_team_tournament_mapping, 'tournaments.id = team_tournament_mapping.tournament_id')
			->where('team_tournament_mapping.team_id', $team_id)
			->where('team_tournament_mapping.status', '2')
			->get()
			->result();
	}

	public function getTournamentsByPlayerID($player_id)
	{
		return $this->db->select('tournaments.id, tournaments.tournament_name, tournaments.logo, tournaments.starting_date, tournaments.tournament_status, (SELECT count(*) from team_tournament_mapping where team_tournament_mapping.status = 2 AND tournaments.id = team_tournament_mapping.tournament_id) as team_count')
			->from($this->table_tournaments)
			->join($this->table_team_tournament_mapping, 'tournaments.id = team_tournament_mapping.tournament_id')
			->join($this->table_tournament_player_mapping, 'tournaments.id = tournament_player_mapping.tournament_id')
			->where('tournament_player_mapping.player_id', $player_id)
			->get()
			->result();
	}

	public function getUpComingTournamentsByTeamID($team_id)
	{
		return $this->db->select('tournaments.id, tournaments.tournament_name, tournaments.logo, tournaments.starting_date, tournaments.tournament_status, (SELECT count(*) from team_tournament_mapping where team_tournament_mapping.status = 2 AND tournaments.id = team_tournament_mapping.tournament_id) as team_count, tournaments.min_squad, tournaments.max_squad')
			->from($this->table_tournaments)
			->join($this->table_team_tournament_mapping, 'tournaments.id = team_tournament_mapping.tournament_id AND (team_tournament_mapping.status = 1 OR team_tournament_mapping.status = 2)')
			->where('team_tournament_mapping.team_id', $team_id)
			->where('tournaments.tournament_status', 0)
			->get()
			->result();
	}

	public function getUpComingTournamentsByPlayerID($player_id)
	{
		return $this->db->select('tournaments.id, tournaments.tournament_name, tournaments.logo, tournaments.starting_date, tournaments.tournament_status, (SELECT count(*) from team_tournament_mapping where team_tournament_mapping.status = 2 AND tournaments.id = team_tournament_mapping.tournament_id) as team_count')
			->from($this->table_tournaments)
			->join($this->table_tournament_player_mapping, 'tournaments.id = tournament_player_mapping.tournament_id')
			->where('tournament_player_mapping.player_id', $player_id)
			->where('tournaments.tournament_status', 0)
			->get()
			->result();
	}

	public function getTournamentSquadDateByID($tournament_id)
	{
		return $this->db->select('tournaments.squad_submission_date')
			->from($this->table_tournaments)
			->where('tournaments.id', $tournament_id)
			->get()->row();
	}

	public function getTournamentSquadByTeamID($team_id, $tournament_id)
	{
		return $this->db->select('tournament_player_mapping.player_id as id, tournament_player_mapping.shirt_number, tournament_player_mapping.role_id, players.player_name, players.image, player_role.role_name as player_role, player_playing_status.name as playing_status')
			->from($this->table_tournament_player_mapping)
			->join($this->table_players, 'tournament_player_mapping.player_id = players.id')
			->join($this->table_player_role, 'tournament_player_mapping.role_id = player_role.id')
			->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id')
			->where('tournament_player_mapping.tournament_id', $tournament_id)
			->where('tournament_player_mapping.team_id', $team_id)
			->get()
			->result();
	}

	public function getTournamentTeamsByID($tournament_id)
	{
		return $this->db->select('teams.id, teams.company_name as name, teams.logo as image, (SELECT count(*) from players where players.team_id = teams.id AND players.status = 1) as player_count')
			->from($this->table_team_tournament_mapping)
			->join($this->table_teams, 'team_tournament_mapping.team_id = teams.id')
			->where('team_tournament_mapping.status', 2)
			->where('team_tournament_mapping.tournament_id', $tournament_id)
			->get()
			->result();
	}

	public function getTournamentAboutByTeamID($team_id, $tournament_id)
	{
		return $this->db->select('clubs.club_name')
			->from($this->table_tournaments)
			->join($this->table_clubs, 'tournaments.club_id = clubs.id')
			->where('tournaments.id', $tournament_id)
			->get()
			->row();
	}

	public function getTournamentPoolsByID($tournament_id)
	{
		return $this->db->select('id, pools_name')
			->from($this->table_pools)
			->where('pools.tournament_id', $tournament_id)
			->get()
			->result();
	}

	public function getTeamsByPoolID($pool_id)
	{
		return $this->db->select('team_pool_mapping.pool_id, teams.company_name as name, teams.display_name, teams.logo')
			->from($this->table_team_pool_mapping)
			->join($this->table_teams, 'teams.id = team_pool_mapping.team_id')
			->where('team_pool_mapping.pool_id', $pool_id)
			->get()
			->result();
	}

	public function acceptInvitation($invitation, $team_id, $tournament_id)
	{
		return $this->db->where('team_id', $team_id)->where('tournament_id', $tournament_id)->update($this->table_team_tournament_mapping, $invitation);
	}

	public function deleteTournamentPlayers($team_id, $tournament_id)
	{
		return $this->db->where('team_id', $team_id)->where('tournament_id', $tournament_id)->delete($this->table_tournament_player_mapping);
	}

	public function insertTournamentPlayer($player)
	{
		return $this->db->insert($this->table_tournament_player_mapping, $player);
	}

	public function get_top_5_batsman_by_tournament_id($id)
	{
		return $this->db->select('players.player_name,players.image,players.id, SUM(batsman_score.runs_scored) as stats')
			->from($this->table_batsman_score)
			->join($this->table_ball_by_ball, 'ball_by_ball.Match_Id = batsman_score.Match_Id 
			and ball_by_ball.innings_no = batsman_score.innings_no and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id')
			->join($this->table_players, 'striker = players.id')
			->join($this->table_matches, 'matches.id = batsman_score.match_id')
			->where('matches.tournament_id', $id)
			->group_by('striker')
			->order_by('stats', 'DESC')
			->limit(5)
			->get()->result();
	}

	public function get_top_5_bowlers_by_tournament_id($id)
	{
		return $this->db->select('players.player_name,players.image,players.id as player_id, count(match_wickets.id) as stats')
			->from($this->table_match_wickets)
			->join($this->table_ball_by_ball, 'ball_by_ball.Match_Id = match_wickets .Match_Id 
			and ball_by_ball.innings_no = match_wickets.innings_no and ball_by_ball.over_id = match_wickets.over_id 
			and ball_by_ball.ball_id = match_wickets.ball_id')
			->join($this->table_players, 'striker = players.id')
			->join($this->table_matches, 'matches.id = match_wickets.match_id')
			->where('matches.tournament_id', $id)
			->group_by('bowler')
			->order_by('stats', 'DESC')
			->limit(5)
			->get()->result();
	}

	public function get_top_5_super_six_count_by_tournament_id($id)
	{
		return $this->db->select(' players.player_name,players.image,players.id as player_id, count(match_wickets.id) as stats')
			->from($this->table_match_wickets)
			->join($this->table_ball_by_ball, 'ball_by_ball.Match_Id = match_wickets .Match_Id 
			and ball_by_ball.innings_no = match_wickets.innings_no and ball_by_ball.over_id = match_wickets.over_id 
			and ball_by_ball.ball_id = match_wickets.ball_id')
			->join($this->table_players, 'bowler = players.id')
			->join($this->table_matches, 'matches.id = match_wickets.match_id')
			->where('matches.tournament_id', $id)
			->group_by('bowler')
			->order_by('stats', 'DESC')
			->limit(5)
			->get()->result();
	}

	public function get_top_5_best_fielders_by_tournament_id($id)
	{
		return $this->db->select(' players.player_name,players.image,players.id as player_id, count(match_wickets.fielder) as stats')
			->from($this->table_match_wickets)
			->join('(SELECT player_id,role_id FROM match_player_mapping  WHERE role_id != 2 and role_id != 4  GROUP BY match_player_mapping.player_id)  as a ', 'a on a.player_id = fielder')
			->join($this->table_players, 'fielder = players.id')
			->join($this->table_matches, 'matches.id = match_wickets.match_id')
			->where('matches.tournament_id', $id)
			->group_by('fielder')
			->order_by('stats', 'DESC')
			->limit(5)
			->get()->result();
	}

	public function get_top_5_best_wicket_keepers_by_tournament_id($id)
	{
		return $this->db->select('players.player_name,players.image,players.id as player_id, count(match_wickets.fielder) as stats')
			->from($this->table_match_wickets)
			->join('(SELECT player_id,role_id FROM match_player_mapping  WHERE role_id != 1 and role_id != 3 and role_id != 5  GROUP BY match_player_mapping.player_id)  as a ', 'a on a.player_id = fielder')
			->join($this->table_players, 'fielder = players.id')
			->join($this->table_matches, 'matches.id = match_wickets.match_id')
			->where('matches.tournament_id', $id)
			->group_by('fielder')
			->order_by('stats', 'DESC')
			->limit(5)
			->get()->result();
	}


}
