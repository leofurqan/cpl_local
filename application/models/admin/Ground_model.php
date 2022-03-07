<?php

class Ground_model extends CI_Model
{
	private $table_clubs = 'clubs';
	private $table_grounds = 'grounds';
	private $table_officials = 'officials';
	private $table_teams = 'teams';
	private $table_tournaments = 'tournaments';
	private $table_ground_reservation = 'ground_reservation';
	private $table_user = 'user';
	private $table_players = 'players';

	public function add_ground($data)
	{


		return $this->db->insert($this->table_grounds, $data);
	}

	public function reserve_ground($data)
	{
		return $this->db->insert($this->table_ground_reservation, $data);
	}

	public function get_all_grounds()
	{
		return $this->db->select('*')->from($this->table_grounds)->order_by('status', 'desc')->order_by('id', 'desc')->get()->result();
	}

	public function get_all_reserve_grounds()
	{
		return $this->db->select('tournaments.id, grounds.id, grounds.image, grounds.ground_name, tournaments.tournament_name, ground_reservation.reserve_date')->from($this->table_ground_reservation)->join('tournaments', 'ground_reservation.tournament_id = tournaments.id')->join('grounds', 'ground_reservation.ground_id = grounds.id')->get()->result();
	}

	public function get_reserve_grounds_by_tournament_id($tournament_id)
	{
		return $this->db->select('tournaments.id, grounds.id, grounds.image, grounds.ground_name, tournaments.tournament_name, ground_reservation.reserve_date')
			->from($this->table_ground_reservation)
			->join($this->table_grounds, 'grounds.id = ground_reservation.ground_id')
			->join($this->table_tournaments,'ground_reservation.tournament_id = tournaments.id')
			->where('ground_reservation.tournament_id', $tournament_id)
			->order_by('reserve_date')
			->get()
			->result();
	}

	public function get_ground_by_id($id)
	{
		return $this->db->select('*')->from($this->table_grounds)->where('id', $id)->get()->row();
	}

	public function update_ground($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_grounds, $data);
	}

	public function delete_ground($id)
	{
		return $this->db->where('id', $id)->delete($this->table_grounds);
	}

	public function change_password($password, $id)
	{
		return $this->db->where('id', $id)->update($this->table_grounds, $password);
	}


	public function check_email($email)
	{
		return $this->db->query('SELECT * FROM (SELECT email FROM clubs UNION SELECT email FROM players UNION SELECT email FROM officials UNION SELECT email FROM grounds UNION SELECT email FROM teams UNION SELECT email FROM user) as email where email = "' . $email . '"')->result();

	}

	public function check_contact($contact)
	{
		return $this->db->query('SELECT * FROM (SELECT contact FROM clubs UNION SELECT contact FROM players UNION SELECT contact FROM officials UNION SELECT contact FROM grounds UNION SELECT contact FROM teams UNION SELECT contact FROM user) as contact where contact = "' . $contact . '"')->result();
	}

	public function check_ground_reservation($tournament_id, $ground_id, $date)
	{
		return $this->db->select('*')->from($this->table_ground_reservation)->where('tournament_id', $tournament_id)->where('ground_id', $ground_id)->where('reserve_date', $date)->get();
	}
}
