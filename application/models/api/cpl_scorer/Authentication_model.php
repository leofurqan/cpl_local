<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication_model extends CI_Model
{
	private $table_official = 'officials';
	private $table_team = 'teams';
	private $table_players = 'players';
	private $table_official_type = 'official_type';

	function getOfficial($data)
	{
		return $this->db->select('officials.id, officials.full_name as name, officials.contact, officials.email, officials.image, official_type.type_name as user_type')
			->from($this->table_official)
			->join($this->table_official_type, 'officials.type_id = official_type.id')
			->where('officials.contact', $data['phone'])
			->where('officials.password', $data['password'])
			->where('officials.status', 1)
			->get();
	}

	function getTeam($data)
	{
		return $this->db->select('id, company_name as name, contact, email, logo as image')
			->from($this->table_team)
			->where('contact', $data['phone'])
			->where('password', $data['password'])
			->where('status', 1)
			->get();
	}

	function getPlayer($data)
	{
		return $this->db->select('id, player_name as name, contact, email, image')
			->from($this->table_players)
			->where('contact', $data['phone'])
			->where('password', $data['password'])
			->where('status', 1)
			->get();
	}
}
