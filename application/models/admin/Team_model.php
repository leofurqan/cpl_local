<?php

class Team_model extends CI_Model
{
	private $table_clubs = 'clubs';
	private $table_grounds = 'grounds';
	private $table_officials = 'officials';
	private $table_teams = 'teams';
	private $table_tournaments = 'tournaments';
	private $table_user = 'user';
	private $table_players = 'players';
	private $table_tournament_invitation = 'team_tournament_mapping';
	private $table_pooling_invitation = 'pooling_invitation';

	public function add_team($data)
	{

		return $this->db->insert($this->table_teams, $data);
	}

	public function get_all_teams()
	{
		return $this->db->select('*')->from($this->table_teams)->order_by('status', 'desc')->order_by('id', 'desc')->get()->result();
	}

	public function get_team_by_id($id)
	{
		return $this->db->select('*')->from($this->table_teams)->where('id', $id)->get()->row();
	}

	public function get_team_by_email($email)
	{
		return $this->db->select('*')->from($this->table_teams)->where('email', $email)->get()->row();
	}

	public function update_team($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_teams, $data);
	}

	public function delete_team($id)
	{
		return $this->db->where('id', $id)->delete($this->table_teams);
	}

	public function check_email($email)
	{
		return $this->db->query('SELECT * FROM (SELECT email FROM clubs UNION SELECT email FROM officials UNION SELECT email FROM grounds UNION SELECT email FROM teams UNION SELECT email FROM user) as email where email = "' . $email . '"')->result();

	}

	public function check_contact($contact)
	{
		return $this->db->query('SELECT * FROM (SELECT contact FROM clubs UNION SELECT contact FROM officials UNION SELECT contact FROM grounds UNION SELECT contact FROM teams UNION SELECT contact FROM user) as contact where contact = "' . $contact . '"')->result();
	}

	public function insert_invitation($invitation)
	{
		$this->db->insert($this->table_tournament_invitation, $invitation);
		return $this->db->insert_id();
	}
	public function insert_pooling_invitation($pooling_invitation)
	{
		$this->db->insert($this->table_pooling_invitation, $pooling_invitation);
		return $this->db->insert_id();
	}
	public function get_team_invitation($tournament_id, $team_id)
	{
		return $this->db->select('*')->from($this->table_tournament_invitation)
			->where('tournament_id', $tournament_id)
			->where('team_id', $team_id)
			->get();
	}

	public function get_team_invitation_by_id($invitation_id)
	{
		return $this->db->select('*')->from($this->table_tournament_invitation)
			->where('id', $invitation_id)->get();
	}

	public function get_pooling_invitation($tournament_id, $team_id)
	{
		return $this->db->select('*')->from($this->table_pooling_invitation)
			->where('tournament_id', $tournament_id)
			->where('team_id', $team_id)
			->get();
	}

	public function get_pooling_invitation_by_id($invitation_id)
	{
		return $this->db->select('*')->from($this->table_pooling_invitation)->where('id', $invitation_id)->get();
	}

	public function accept_team_invitation($invitation, $id)
	{
		return $this->db->where('id', $id)->update($this->table_tournament_invitation, $invitation);
	}

	public function change_password($password,$id)
	{
		return $this->db->where('id', $id)->update($this->table_teams, $password);
	}

	public function check_password($password ,$id)
	{
		return $this->db->select('*')->from($this->table_teams)
			->where('id', $id)
			->where('password', sha1($password))->get()->row();
	}

	public function get_team_detail($id)
	{
		return $this->db->select('*')->from($this->table_teams)
			->where('id',$id)
			->get()->row();
	}

}
