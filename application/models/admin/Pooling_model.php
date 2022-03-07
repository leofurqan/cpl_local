<?php

class Pooling_model extends CI_Model
{
	private $table_pooling = 'pooling';
	private $table_pools = 'pools';
	private $table_team_tournament_mapping = 'team_tournament_mapping';
	private $table_team = 'teams';
	private $table_team_pool_mapping = 'team_pool_mapping';


	public function get_pooling_by_tournament_id($tournament_id)
	{
		return $this->db->select('*')->from($this->table_pooling)->where('tournament_id', $tournament_id)->get()->row();
	}

	public function add_pooling($data)
	{
		return $this->db->insert($this->table_pooling, $data);
	}

	public function add_pools($data)
	{
		return $this->db->insert($this->table_pools, $data);
	}

	public function get_teams_by_tournament_id($id)
	{
		return $this->db->select('*')->from($this->table_team_tournament_mapping)
			->join($this->table_team, 'team_id=teams.id')
			->where('tournament_id', $id)
			->where('team_tournament_mapping.status', 2)
			->get()->result();
	}

	public function get_pools_by_pooling_id($id)
	{
		return $this->db->select('*')->from($this->table_pools)
			->where('pooling_id', $id)->get()->result();
	}

	public function add_teams_pools($data)
	{
		return $this->db->insert($this->table_team_pool_mapping, $data);
	}

	public function get_pools_by_tournament_id($id)
	{
		return $this->db->select('*')
			->from($this->table_pools)
			->where('tournament_id', $id)
			->get()->num_rows();
	}
	public function get_no_of_pools_by_tournament_id($id)
	{
		return $this->db->select('*')
			->from($this->table_pools)
			->where('tournament_id', $id)
			->get()->result();
	}



	public function del_pooling_by_tournament_id($id)
	{
		return $this->db->where('tournament_id', $id)->delete($this->table_pooling);
	}

	public function del_pools_by_tournament_id($id)
	{
		return $this->db->where('tournament_id', $id)->delete($this->table_pools);
	}

	public function get_max_id()
	{
		return $this->db->select('*')
			->from($this->table_pooling)
			->order_by('id', 'desc')
			->get()->row();
	}

	public function get_team_pool_mapping($id)
	{
		return $this->db->select('*')
			->from($this->table_team_pool_mapping)
			->where('team_pool_tournament_id', $id)
			->get()->num_rows();
	}
}


