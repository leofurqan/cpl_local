<?php

class login_model extends CI_Model
{
	private $table_teams = 'teams';

	public function check_team($email, $password)
	{
		return $this->db->select('*')->from($this->table_teams)->where('( email = "'.$email.'" or contact = "'.$email.'" ) ' )->where('password', sha1($password))->get()->row();
	}

	public function update_team($data)
	{
		return $this->db->where('id', $this->session->userdata("cpl")["team_id"])->update($this->table_teams, $data);
	}

	function change_password($password)
	{
		return $this->db->where('id', $this->session->userdata("cpl")["team_id"])->update($this->table_teams, $password);
	}

	public function get_team_by_id()
	{
		return $this->db->select('*')->from($this->table_teams)->where('id', $this->session->userdata("cpl")["team_id"])->get()->row();
	}

	public function check_password($password)
	{
		return $this->db->select('*')->from($this->table_teams)
			->where('id', $this->session->userdata("cpl")["team_id"])
			->where('password', sha1($password))->get()->row();
	}
	public function check_email($email)
	{
		return $this->db->query('SELECT * FROM (SELECT email FROM clubs UNION SELECT email FROM officials UNION SELECT email FROM grounds UNION SELECT email FROM teams UNION SELECT email FROM user) as email where email = "' . $email . '"')->result();

	}

	public function check_contact($contact)
	{
		return $this->db->query('SELECT * FROM (SELECT contact FROM clubs UNION SELECT contact FROM officials UNION SELECT contact FROM grounds UNION SELECT contact FROM teams UNION SELECT contact FROM user) as contact where contact = "' . $contact . '"')->result();
	}
}
