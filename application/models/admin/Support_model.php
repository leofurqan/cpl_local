<?php

class Support_model extends CI_Model
{
	private $table_support = 'support';
	private $table_teams = 'teams';
	public function get_all_request()
	{
		return $this->db->select('support.id, team_id,support.subject, support.message, support.status,support.created_date,company_name')->from($this->table_support)
			->join($this->table_teams, 'teams.id = team_id')

			->order_by('status', 'desc')
			->order_by('id', 'desc')
			->get()
			->result();
	}
	public function update_status($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_support, $data);
	}
}
