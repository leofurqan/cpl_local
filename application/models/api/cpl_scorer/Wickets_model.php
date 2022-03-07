<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Wickets_model extends CI_Model
{
	private $table_wicket_types = "wickets_type";
	private $table_match_wickets  = "match_wickets";

	public function getAllWicketsType()
	{
		return $this->db->select('*')->from($this->table_wicket_types)->get()->result();
	}

	public function add_wicket($data)
	{
		return $this->db->insert($this->table_match_wickets,$data);
	}

}
