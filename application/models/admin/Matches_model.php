<?php

class Matches_model extends CI_Model
{
	private $table_matches = 'matches';
	private $table_pools = 'pools';
	private $table_tournaments = 'tournaments';
	private $table_teams = 'teams';

	private $table_innings = 'innings';

	private $table_team_pool_mapping = 'team_pool_mapping';
	private $table_reserved_grounds = 'ground_reservation';
	private $table_grounds = 'grounds';
	private $table_officials = 'officials';
	private $table_official_type = 'official_type';
	private $table_tournament_slots = 'tournament_slots';
	private $table_time_slots = 'time_slots';


	public function add_match($data)
	{
		return $this->db->insert($this->table_matches, $data);
	}

	public function get_all_matches_by_tournament($id)
	{
		return $this->db->select('*,matches.id as match_id')
			->from($this->table_matches)
			->join('(select id, company_name as first_name from teams) as first_team', ' matches.first_team_id = first_team.id')
			->join('(select id, company_name as second_name from teams) as second_team', ' matches.second_team_id = second_team.id')
			->where('tournament_id', $id)
			->order_by('match_date', 'desc')
			->get()->result();
	}

	public function get_time_slots_by_tournament($id)
	{
		return $this->db->select('*')
			->from($this->table_tournament_slots)
			->join($this->table_time_slots, 'time_slots.id = tournament_slots.id')
			->where('tournament_id', $id)
			->get()->result();
	}

	public function get_pools_by_tournament_id($id)
	{
		return $this->db->select('*')
			->from($this->table_pools)
			->where('tournament_id', $id)
			->get()->result();
	}

	public function get_pools_teams($id)
	{
		return $this->db->select('*')
			->from($this->table_team_pool_mapping)
			->where('pool_id', $id)
			->get()->result();
	}

	public function get_all_grounds()
	{
		return $this->db->select('*')
			->from($this->table_grounds)
			->get()->result();
	}

	public function get_all_commentators()
	{
		return $this->db->select('*')
			->from($this->table_officials)
			->where('type_id', 14)
			->get()->result();
	}

	public function get_all_coordinator()
	{
		return $this->db->select('*')
			->from($this->table_officials)
			->where('type_id', 3)
			->get()->result();
	}


	public function get_all_scorers()
	{
		return $this->db->select('*')
			->from($this->table_officials)
			->where('type_id', 1)
			->get()->result();

	}

	public function get_all_umpires()
	{
		return $this->db->select('*')
			->from($this->table_officials)
			->where('type_id', 2)
			->get()->result();
	}

	public function update_match($id, $data)
	{
		return $this->db->where('id', $id)->update($this->table_matches, $data);
	}

	/*Ajax Function*/
	public function get_teams_by_id($id)
	{
		return $this->db->select('*,matches.id as match_id')
			->from($this->table_matches)
			->join('(select id, company_name as first_name from teams) as first_team', ' matches.first_team_id = first_team.id')
			->join('(select id, company_name as second_name from teams) as second_team', ' matches.second_team_id = second_team.id')
			->where('matches.id', $id)
			->get()->row();
	}

	public function get_second_umpire($id)
	{
		return $this->db->select('*')
			->from($this->table_officials)
			->where_not_in('id', $id)
			->where('type_id', 2)
			->get()->result();
	}

	public function get_third_umpire($id, $second_id)
	{
		return $this->db->select('*')
			->from($this->table_officials)
			->where_not_in('id', $id)
			->where_not_in('id', $second_id)
			->where('type_id', 2)
			->get()->result();
	}

	public function get_matches_by_date($date, $time, $ground)
	{
		return $this->db->select('id,match_time,day(match_date) as day ')
			->from($this->table_matches)
			->where('match_time', $time)
			->where('ground_id', $ground)
			->where('day(match_date)', $date)
			->get()->num_rows();
	}

	public function get_all_live_matches()
	{
		return $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time,time_slots.starting_time, matches.status')
			->from($this->table_matches)
			->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
			->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
			->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
			->join($this->table_grounds, 'matches.ground_id = grounds.id')
			->join($this->table_time_slots, 'time_slots.id = matches.match_time')
			->where('matches.status', 1)
			->get()
			->result();
	}

	public function get_match_data($id)
	{
		return $this->db->select('*')
			->from($this->table_innings)
			->where('match_id', $id)
			->order_by('innings_no', 'desc')
			->get()->row();
	}


	public function get_grounds_by_reserve_date($id, $date)

	{
		return $this->db->select('*')
			->from($this->table_reserved_grounds)
			->join($this->table_grounds, 'ground_id = grounds.id')
			->where('tournament_id', $id)
			->where('reserve_date', $date)
			->get()->result();
	}

	public function get_grounds_by_tournament_id($id)
	{
		return $this->db->select('*')
			->from($this->table_reserved_grounds)
			->join($this->table_grounds, 'ground_id = grounds.id')
			->where('tournament_id', $id)
			->get()->result();
	}
}
