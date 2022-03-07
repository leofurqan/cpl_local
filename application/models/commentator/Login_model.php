<?php


class login_model extends CI_Model
{
		private $table_officials = 'officials';

	public function check_user($email, $password)
	{
		return $this->db->select('*')->from($this->table_officials)->where('email', $email)->where('password', sha1($password))->where('type_id', '14')->get()->row();
	}

	function change_password($password)
	{
		return $this->db->where('id', $this->session->userdata("user")["user_id"])->update($this->table_officials, $password);
	}

	public function get_user_by_id()
	{
		return $this->db->select('*')->from($this->table_officials)->where('id', $this->session->userdata("cpl")["user_id"])->get()->row();
	}

	public function check_password($password)
	{
		return $this->db->select('*')->from($this->table_officials)
			->where('id', $this->session->userdata("cpl")["user_id"])
			->where('password', sha1($password))->get()->row();
	}

	public function update_profile($data)
	{
		return $this->db->where('id',$this->session->userdata("cpl")["user_id"])->update($this->table_officials,$data);
	}

}
