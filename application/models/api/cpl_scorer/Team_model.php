<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team_model extends CI_Model
{
	private $table_team = 'teams';

	public function getTeamByID($team_id)
	{
		return $this->db->select('id, company_name as name, logo as image')
			->from($this->table_team)
			->where('id', $team_id)
			->get()
			->row();
	}
}
