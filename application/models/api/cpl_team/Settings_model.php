<?php


class Settings_model extends CI_Model
{

	private $table_application_settings = 'application_settings';

	public function get_all_application_settings()
	{
		return $this->db->select('*')
			->from($this->table_application_settings)
			->get()->result();
	}
	public function get_application_setting_by_id($id)
	{
		return $this->db->select('*')
			->from($this->table_application_settings)
			->where('id',$id)
			->get()->row();
	}
}
