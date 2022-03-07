<?php

class Official_model extends CI_Model
{
	private $table_clubs = 'clubs';
	private $table_grounds = 'grounds';
	private $table_officials = 'officials';
	private $table_teams = 'teams';
	private $table_tournaments = 'tournaments';
	private $table_user = 'user';
	private $table_players = 'players';
	private $table_official_type = 'official_type';

	public function add_official($data)
	{
		//var_dump($data);die();
		return $this->db->insert($this->table_officials, $data);
	}

	public function official_type($data)
	{
//	var_dump($data);die();
		return $this->db->insert($this->table_official_type, $data);
	}

	public function get_all_official_types()
	{

		return $this->db->select('*')
			->from($this->table_official_type)
			->order_by('status', 'asc')->get()->result();
	}

	public function get_all_officials()
	{
		return $this->db->select('officials.*, official_type.type_name')
			->from($this->table_officials)
			->join('official_type', 'officials.type_id = official_type.id')
			->order_by('status', 'desc')->get()->result();
	}

	public function delete_official($id)
	{
		return $this->db->where('id', $id)->delete($this->table_officials);
	}

	public function get_official_by_id($id)
	{
		return $this->db->select('*')->from($this->table_officials)->where('id', $id)->get()->row();
	}

	public function update_official($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_officials, $data);

	}

	public function change_password($password,$id)
	{
		return $this->db->where('id', $id)->update($this->table_officials, $password);
	}

	public function check_email($email)
	{
		return $this->db->query('SELECT * FROM (SELECT email FROM clubs UNION SELECT email FROM players UNION SELECT email FROM officials UNION SELECT email FROM grounds UNION SELECT email FROM teams UNION SELECT email FROM user) as email where email = "' . $email . '"')->result();

	}

	public function check_contact($contact)
	{
		return $this->db->query('SELECT * FROM (SELECT contact FROM clubs UNION SELECT contact FROM players UNION SELECT contact FROM officials UNION SELECT contact FROM grounds UNION SELECT contact FROM teams UNION SELECT contact FROM user) as contact where contact = "' . $contact . '"')->result();
	}
}
