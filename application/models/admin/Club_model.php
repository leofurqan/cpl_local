<?php

class Club_model extends CI_Model
{
	private $table_clubs = 'clubs';
	private $table_grounds = 'grounds';
	private $table_officials = 'officials';
	private $table_teams = 'teams';
	private $table_tournaments = 'tournaments';
	private $table_user = 'user';
	private $table_players = 'players';


	public function add_club($data)
	{
		return $this->db->insert($this->table_clubs, $data);
	}

	public function get_all_clubs()
	{
		return $this->db->select('*')->from($this->table_clubs)->order_by('status', 'desc')->order_by('id', 'desc')->get()->result();
	}

	public function get_club_by_id($id)
	{
		return $this->db->select('*')->from($this->table_clubs)->where('id', $id)->get()->row();
	}

	public function update_club($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_clubs, $data);
	}

	public function delete_club($id)
	{
		return $this->db->where('id', $id)->delete($this->table_clubs);
	}

	public function change_password($password, $id)
	{
		return $this->db->where('id', $id)->update($this->table_clubs, $password);
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


