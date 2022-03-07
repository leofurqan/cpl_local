<?php defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{
	private $table_players = 'players';

	public function check_player($email, $password)
	{
		return $this->db->select('*')->from($this->table_players)->where('( email = "'.$email.'" or contact = "'.$email.'" ) ' )->where('password', $password)->get()->row();
	}

	public function update_player($data)
	{
		return $this->db->where('id', $this->session->userdata("cpl")["player_id"])->update($this->table_players, $data);
	}

	function change_password($password)
	{
		return $this->db->where('id', $this->session->userdata("cpl")["player_id"])->update($this->table_players, $password);
	}

	public function get_player_by_id()
	{
		return $this->db->select('*')->from($this->table_players)->where('id', $this->session->userdata("cpl")["player_id"])->get()->row();
	}

	public function check_password($password)
	{
		return $this->db->select('*')->from($this->table_players)
			->where('id', $this->session->userdata("cpl")["player_id"])
			->where('password', sha1($password))->get()->row();
	}
}
