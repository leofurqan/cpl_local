<?php

class Tournament_model extends CI_Model
{
	private $table_tournaments = 'tournaments';
	private $table_tournament_point = 'tournament_point_system';
	private $table_bonus_points = 'tournament_bonus_points';
	private $table_team_tournament_mapping = 'team_tournament_mapping';
	private $table_tournament_player_mapping = 'tournament_player_mapping';
	private $table_clubs = 'clubs';
	private $table_formate = 'tournament_formate';
	private $table_teams = 'teams';
	private $table_term_condition = 'tournament_term_condition';
	private $table_ground_reservation = 'ground_reservation';
	private $table_email_templates = 'email_templates';
	private $table_players = 'players';
	private $table_roles = 'player_role';
	private $table_kit_size = 'player_kit_size';
	private $table_player_playing_status = 'player_playing_status';
	private $table_match_scheduling_format = 'match_scheduling_format';
	private $table_time_slots = 'time_slots';
	private $table_tournament_slots = 'tournament_slots';
	private $table_match_scheduling_tournament = 'match_scheduling_tournament';
	private $table_match_result = 'match_result';
	private $table_ball_by_ball = 'ball_by_ball';
	private $table_match_wickets = 'match_wickets';
	private $table_batsman_score = 'batsman_score';
	private $table_extra_runs = 'extra_runs';
	private $table_toss_decision = 'toss_decision';
	private $table_innings = 'innings';
	private $table_matches = 'matches';
	private $table_pools = 'pools';
	private $table_team_pool_mapping = 'team_pool_mapping';


	public function add_tournament($data)
	{
		return $this->db->insert($this->table_tournaments, $data);
	}

	public function add_tournament_rules($data)
	{
		return $this->db->insert($this->table_formate, $data);
	}

	public function add_point_system($data)
	{
		return $this->db->insert($this->table_tournament_point, $data);
	}

	public function reserve_ground($data)
	{
		return $this->db->insert($this->table_ground_reservation, $data);
	}

	public function add_icc_rules($data)
	{
		return $this->db->insert($this->table_icc_rules, $data);
	}

	public function add_code_conduct($data)
	{
		return $this->db->insert($this->table_code_conduct, $data);
	}

	public function get_cps_rules()
	{
		return $this->db->select('*')->from($this->table_email_templates)->where('template_name', 'cps_rules')->get()->row();
	}

	public function get_code_of_conduct()
	{
		return $this->db->select('*')->from($this->table_email_templates)->where('template_name', 'code_of_conduct')->get()->row();
	}

	public function get_all_clubs()
	{
		return $this->db->select('*')->from($this->table_clubs)->get()->result();
	}

	public function get_all_tournaments()
	{
		return $this->db->select('tournaments.*, clubs.club_name')->from($this->table_tournaments)
			->join('clubs', 'tournaments.club_id = clubs.id')
			->order_by('status', 'desc')->order_by('id', 'desc')->get()->result();
	}

	public function get_all_confirmed_teams($id)
	{
		return $this->db->select('*')->from($this->table_team_tournament_mapping)
			->join('teams', 'team_tournament_mapping.team_id = teams.id')
			->where('team_tournament_mapping.status', 2)
			->where('team_tournament_mapping.tournament_id', $id)
			->get()->result();
	}

	public function get_all_live_tournaments()
	{
		return $this->db->select('tournaments.*, clubs.club_name')->from($this->table_tournaments)
			->join('clubs', 'tournaments.club_id = clubs.id')
			->where('tournament_status', 1)
			->order_by('id', 'desc')->get()->result();
	}

	public function get_not_sent_teams_from_tournament_mapping($id)
	{
		return $this->db->select('*')
			->from($this->table_teams)
			->join($this->table_team_tournament_mapping, 'team_tournament_mapping.team_id = teams.id
			and team_tournament_mapping.tournament_id = ' . $id . '
			', 'left')
			->where('team_tournament_mapping.id', null)
			->get()->result();
	}

	public function get_sent_teams_from_tournament_mapping($id)
	{
		return $this->db->select('*')
			->from($this->table_teams)
			->join($this->table_team_tournament_mapping, 'team_tournament_mapping.team_id = teams.id')
			->where('tournament_id', $id)
			->where('team_tournament_mapping.status', 0)
			->get()->result();
	}


	public function get_accepted_teams_from_tournament_mapping($id)
	{
		return $this->db->select('teams.*, team_tournament_mapping.id as invite_id')
			->from($this->table_teams)
			->join($this->table_team_tournament_mapping, 'team_tournament_mapping.team_id = teams.id')
			->where('tournament_id', $id)
			->where('team_tournament_mapping.status', 1)
			->get()->result();
	}

	public function get_confirmed_teams_from_tournament_mapping($id)
	{
		return $this->db->select('teams.*, team_tournament_mapping.id as invite_id')
			->from($this->table_teams)
			->join($this->table_team_tournament_mapping, 'team_tournament_mapping.team_id = teams.id')
			->where('tournament_id', $id)
			->where('team_tournament_mapping.status', 2)
			->get()->result();
	}

	public function delete_tournament($id)
	{
		return $this->db->where('id', $id)->delete($this->table_tournaments);
	}

	public function get_tournament_by_id($id)
	{
		return $this->db->select('*')->from($this->table_tournaments)->where('id', $id)->get()->row();
	}

	public function get_team_by_id($id)
	{
		return $this->db->select('*')->from($this->table_teams)->where('id', $id)->get()->row();
	}

	public function edit_tournament($tournament, $id)
	{
		return $this->db->where('id', $id)->update($this->table_tournaments, $tournament);
	}

	public function get_all_tournament_formats()
	{
		return $this->db->select('*')->from($this->table_formate)->get()->result();
	}

	public function get_all_point_system()
	{
		return $this->db->select('*')->from($this->table_tournament_point)->get()->result();
	}

	public function get_tournament_rules_by_id($id)
	{
		return $this->db->select('*')->from($this->table_formate)->where('id', $id)->get()->row();
	}

	public function get_point_system_by_id($id)
	{
		return $this->db->select('*')->from($this->table_tournament_point)->where('id', $id)->get()->row();
	}

	public function edit_tournament_rules($rules, $id)
	{
		return $this->db->where('id', $id)->update($this->table_formate, $rules);
	}

	public function edit_point_system($rules, $id)
	{
		return $this->db->where('id', $id)->update($this->table_tournament_point, $rules);
	}

	public function delete_tournament_rules($id)
	{
		return $this->db->where('id', $id)->delete($this->table_formate);
	}

	public function delete_point_system($id)
	{
		return $this->db->where('id', $id)->delete($this->table_tournament_point);
	}

	public function update_tournament($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_tournaments, $data);
	}

	public function update_status($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_team_tournament_mapping, $data);
	}

	public function update_cps_rules($data)
	{
		return $this->db->where('template_name', 'cps_rules')->update($this->table_email_templates, $data);
	}

	public function update_code_of_conduct($data)
	{
		return $this->db->where('template_name', 'code_of_conduct')->update($this->table_email_templates, $data);
	}

	public function update_tournament_points($data, $id)
	{
		return $this->db->where('tournament_id', $id)->update($this->table_tournament_point, $data);
	}

	public function update_bonus_points($data, $id)
	{
		return $this->db->where('tournament_id', $id)->update($this->table_bonus_points, $data);
	}

	public function update_rules($data, $id)
	{
		return $this->db->where('tournament_id', $id)->update($this->table_rules, $data);
	}

	public function update_term_condition($data, $id)
	{
		return $this->db->where('tournament_id', $id)->update($this->table_term_condition, $data);
	}

	public function get_tournament_format_by_t_id($id)
	{
		return $this->db->select('*')
			->from($this->table_tournaments)
			->join($this->table_formate, 'tournament_format_id = tournament_formate.id')
			->where('tournaments.id', $id)
			->get()->row();
	}

	public function get_squad_by_tournament_team_id($tournament_id, $team_id)
	{
		return $this->db->select('players.id, players.player_name, players.image, player_playing_status.name as playing_status, player_role.role_name, player_kit_size.player_size, tournament_player_mapping.shirt_number')
			->from($this->table_tournament_player_mapping)
			->join($this->table_players, 'tournament_player_mapping.player_id = players.id')
			->join($this->table_player_playing_status, 'player_playing_status.id = players.playing_status')
			->join($this->table_roles, 'tournament_player_mapping.role_id = player_role.id')
			->join($this->table_kit_size, 'tournament_player_mapping.kit_size = player_kit_size.id')
			->where('tournament_player_mapping.tournament_id', $tournament_id)
			->where('tournament_player_mapping.team_id', $team_id)
			->get()
			->result();
	}


	public function get_team_count_by_tournament_id($tournament_id)
	{
		return $this->db->select('count(*) as team_count')->from($this->table_team_tournament_mapping)->where('tournament_id', $tournament_id)->where('status', 2)->get()->row()->team_count;
	}

	public function get_all_match_format()
	{
		return $this->db->select('*')
			->from($this->table_match_scheduling_format)
			->get()->result();
	}

	public function get_all_slots()
	{
		return $this->db->select('*')
			->from($this->table_time_slots)
			->get()->result();
	}

	public function get_all_slots_by_tournament_id($id)
	{
		return $this->db->select('*')
			->from($this->table_time_slots)
			->join($this->table_tournament_slots, 'time_slot_id = time_slots.id')
			->where('tournament_id', $id)
			->get()->result();
	}

	public function add_scheduling($data)
	{
		return $this->db->insert($this->table_match_scheduling_tournament, $data);
	}

	public function add_tournament_slots($data)
	{
		return $this->db->insert($this->table_tournament_slots, $data);
	}

	public function get_scheduling_by_tournament_id($id)
	{
		return $this->db->select('tournament_id')
			->from($this->table_match_scheduling_tournament)
			->where('tournament_id', $id)
			->get()->num_rows();
	}

	public function reset_match_schedule($match_id)
	{
		return $this->db->where('id', $match_id)->update($this->table_matches, array('ground_id' => 0, 'scorer_id' => 0, 'match_date' => '0000-00-00', 'match_time' => 0));
	}

	public function get_table_point($id)
	{
		$sql = "select `team`, sum(is_win) as num_wins, sum(is_loss) as num_losses, sum(is_tie) as num_ties,
 				(SUM(is_win) + SUM(is_loss) + SUM(is_tie)) as num_total FROM (
 				(select first_team_id as team, (case when match_winner  = first_team_id then 1 else 0 end) as is_win, (case when match_winner = second_team_id then 1 else 0 end) as is_loss, (case when match_winner is null then 1 else 0 end) as is_tie from matches where tournament_id = $id) 
 				union all (select second_team_id as team, (case when match_winner  = second_team_id then 1 else 0 end) as is_win, (case when match_winner = first_team_id then 1 else 0 end) as is_loss, (case when match_winner is null then 1 else 0 end) as is_tie from matches where tournament_id = $id)
 					)m 
 				GROUP BY `team`";
		return $this->db->query($sql)->result();
	}

	public function get_nrr($team_id, $tournament_id)
	{
		return $this->db->select('ROUND(SUM(total_run_rate), 4) as nrr')
			->from($this->table_match_result)
			->where('team_id', $team_id)
			->where('tournament_id', $tournament_id)
			->get()->row();
	}

	public function get_current_tournament_pools($id)
	{
		return $this->db->select('*')->from($this->table_tournaments)
			->join($this->table_pools, 'tournaments.id= pools.tournament_id')
			->where('tournaments.id', $id)
			->where('tournament_status', 1)
			->get()
			->result();
	}

	public function get_all_teams_by_pool($id)
	{
		return $this->db->select('*')->from($this->table_tournaments)
			->join($this->table_pools, 'tournaments.id= pools.tournament_id')
			->join($this->table_team_pool_mapping, 'team_pool_mapping.pool_id= pools.id')
			->join($this->table_teams, 'team_pool_mapping.team_id = teams.id')
			->where('tournament_status', 1)
			->where('tournaments.id', $id)
			->get()
			->result();
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
 						WHERE `matches`.`tournament_id`=' . $id . '
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
 						WHERE `matches`.`tournament_id`=' . $id . '
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
 						WHERE `matches`.`tournament_id`=' . $id . '
 						group by striker) as A')
			->get()->row();
	}

	public function get_max_wickets_by_tournament_id($id)
	{
		return $this->db->select('max(match_wickets) as max_wickets')
			->from('(SELECT COUNT(match_wickets.player_id) as match_wickets from match_wickets 
						JOIN matches ON matches.id = match_wickets.match_id
						WHERE `matches`.`tournament_id`=' . $id . '
						 GROUP BY player_id
						 ) as A')
			->get()->row();
	}

	public function get_count_of_confirmed_teams($id)
	{
		return $this->db->select('*')
			->from($this->table_team_tournament_mapping)
			->where('tournament_id', $id)
			->where('status', 2)
			->get()->num_rows();
	}

	public function get_no_of_reserved_grounds_by_id($id)
	{
		return $this->db->select('*')
			->from($this->table_ground_reservation)
			->where('tournament_id', $id)
			->get()->num_rows();
	}

	public function get_top_5_batsman_by_tournament_id($id)
	{

		return $this->db->select('players.image,players.player_name,sum(batsman_score.runs_scored) as max_score')
			->from($this->table_matches)
			->join($this->table_batsman_score, 'batsman_score.match_id = matches.id')
			->join($this->table_ball_by_ball, 'ball_by_ball.match_id = batsman_score.match_id
						and ball_by_ball.innings_no = batsman_score.innings_no 
 						and ball_by_ball.over_id = batsman_score.over_id 
 						and ball_by_ball.ball_id = batsman_score.ball_id')
			->join($this->table_players, 'ball_by_ball.striker = players.id')
			->where('matches.tournament_id', $id)
			->group_by('striker')
			->order_by('max_score', 'desc')
			->limit(5)
			->get()->result();
	}

	public function get_top_5_bowler_by_tournament_id($id)
	{

		return $this->db->select('players.image,players.player_name,count(*) as wickets')
			->from($this->table_ball_by_ball)
			->join($this->table_match_wickets,
				'ball_by_ball.match_id = match_wickets.match_id 
			and ball_by_ball.innings_no = match_wickets.innings_no
			 and ball_by_ball.over_id = match_wickets.over_id 
			 and ball_by_ball.ball_id = match_wickets.ball_id')
			->join($this->table_matches, 'ball_by_ball.match_id = matches.id')
			->join($this->table_players, 'match_wickets.player_id = players.id')
			->where('match_wickets.wicket_type !=', 7)
			->where('match_wickets.wicket_type !=', 9)
			->where('match_wickets.wicket_type !=', 10)
			->where('match_wickets.wicket_type !=', 11)
			->where('matches.tournament_id', $id)
			->group_by('match_wickets.player_id')
			->order_by('wickets', 'desc')
			->limit(5)
			->get()->result();
	}

	public function get_top_5_sixes_by_tournament_id($id)
	{

		return $this->db->select('players.image,players.player_name,count(*) as sixes')
			->from($this->table_matches)
			->join($this->table_batsman_score, 'batsman_score.match_id = matches.id')
			->join($this->table_ball_by_ball, 'ball_by_ball.match_id = batsman_score.match_id
						and ball_by_ball.innings_no = batsman_score.innings_no 
 						and ball_by_ball.over_id = batsman_score.over_id 
 						and ball_by_ball.ball_id = batsman_score.ball_id')
			->join($this->table_players, 'ball_by_ball.striker = players.id')
			->where('matches.tournament_id', $id)
			->where('batsman_score.runs_scored = 6')
			->group_by('striker')
			->order_by('sixes', 'desc')
			->limit(5)
			->get()->result();
	}

}
