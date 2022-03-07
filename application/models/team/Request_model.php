<?php

class Request_model extends CI_Model
{
	private $table_support = 'support';
	private $table_teams = 'teams';

	public function send_request($data)
	{
		//var_dump($data);die();
		return $this->db->insert($this->table_support, $data);
	}
	public function get_all_request()
	{
		return $this->db->select('support.id, support.subject, support.message, support.status,company_name')->from($this->table_support)
			->join($this->table_teams, 'teams.id = team_id')

			->order_by('status', 'desc')
			->order_by('id', 'desc')
			->get()
			->result();
	}
}
