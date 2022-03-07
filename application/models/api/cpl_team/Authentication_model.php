<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authentication_model extends CI_Model
{
	private $table_team = 'teams';
	private $table_players = 'players';
	private $table_user_verification = 'user_verification';

	function getTeam($phone, $password)
	{
		return $this->db->select('id, company_name as name, contact, email, logo as image, is_verified')
			->from($this->table_team)
			->where('contact', $phone)
			->where('password', $password)
			->where('status', 1)
			->get();
	}

	function getPlayer($phone, $password)
	{
		return $this->db->select('id, player_name as name, contact, email, image, playing_status, batting_style, bowling_style, is_verified')
			->from($this->table_players)
			->where('contact', $phone)
			->where('password', $password)
			->where('status', 1)
			->get();
	}

	function get_player_by_id($user_id)
	{
		return $this->db->select('id, player_name as name, contact, email, image, playing_status, batting_style, bowling_style, is_verified')
			->from($this->table_players)
			->where('id', $user_id)
			->get()
			->row();
	}
	function get_team_by_id($user_id)
	{
		return $this->db->select('id, company_name as name, contact, email, logo as image, is_verified')
			->from($this->table_team)
			->where('id', $user_id)
			->get()
			->row();
	}


	function update_team_password($user_id, $c_password, $n_password)
	{
		$user = $this->db->select('*')->from($this->table_team)->where('id', $user_id)->where('password', sha1($c_password))->get();

		if ($user->num_rows() > 0) {
			$data = array('password' => sha1($n_password));
			return $this->db->where('id', $user_id)->update($this->table_team, $data);
		} else {
			return false;
		}
	}

	function update_player_password($user_id, $c_password, $n_password)
	{
		$user = $this->db->select('*')->from($this->table_players)->where('id', $user_id)->where('password', sha1($c_password))->get();

		if ($user->num_rows() > 0) {
			$data = array('password' => sha1($n_password));
			return $this->db->where('id', $user_id)->update($this->table_players, $data);
		} else {
			return false;
		}
	}

	function updateFCMByTeamID($team_id, $token)
	{
		$this->db->where('id', $team_id)->update($this->table_team, array('fcm' => $token));
	}

	function updateFCMByPlayerID($player_id, $token)
	{
		$this->db->where('id', $player_id)->update($this->table_players, array('fcm' => $token));
	}

	function check_team_by_password($user_id, $password)
	{
		return $this->db->select('*')->from($this->table_team)->where('id', $user_id)->where('password', sha1($password))->get();
	}

	function check_player_by_password($user_id, $password)
	{
		return $this->db->select('*')->from($this->table_players)->where('id', $user_id)->where('password', sha1($password))->get();
	}

	function update_player_by_id($data, $user_id)
	{
		return $this->db->where('id', $user_id)->update($this->table_players, $data);
	}

	function send_verification_code($data)
	{
		return $this->db->insert($this->table_user_verification, $data);
	}

	function get_verification_by_user_id($user_id, $user_role, $code)
	{
		return $this->db->select('*')->from($this->table_user_verification)
			->where('user_role', $user_role)
			->where('user_id', $user_id)
			->where('verification_code', $code)->get();
	}

	function verify_player($player_id)
	{
		return $this->db->where('id', $player_id)->update($this->table_players, array('is_verified' => 1));
	}
	function verify_team($team_id)
	{
		return $this->db->where('id', $team_id)->update($this->table_team, array('is_verified' => 1));
	}

}
