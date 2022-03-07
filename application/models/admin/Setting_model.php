<?php

class Setting_model extends CI_Model
{
	private $table_email_template = 'email_templates';
	private $table_settings = 'settings';
	private $table_sma_api = 'sms_api';
	private $table_tournament_slots = 'time_slots';
	private $table_application_settings = 'application_settings';


	public function get_all_email_templates()
	{
		return $this->db->select('*')->from($this->table_email_template)->get()->result();
	}
	public function get_all_login_templates()
	{
		return $this->db->select('*')->from($this->table_email_template)->get()->result();
	}
	public function get_all_registration_templates()
	{
		return $this->db->select('*')->from($this->table_email_template)->get()->result();
	}
	public function get_all_sms_api()
	{
		return $this->db->select('*')->from($this->table_settings)->get()->row();
	}
   public function get_api_info()
	{
		return $this->db->select('*')->from($this->table_sma_api)->where('id','1')->get()->row();
	}

	public function update_sms_api($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_settings, $data);

	}
	public function update_api_info($data, $id)
	{
		return $this->db->where('id', $id)->update($this->table_sma_api, $data);

	}

	public function update_email_template($template, $template_name)
	{
		return $this->db->where('template_name', $template_name)->update($this->table_email_template, $template);
	}
	public function update_login_template($login, $template_name)
	{
		return $this->db->where('template_name', $template_name)->update($this->table_email_template, $login);
	}
	public function update_registration_template($registration, $template_name)
	{
		return $this->db->where('template_name', $template_name)->update($this->table_email_template, $registration);
	}

	public function update_cps_rules($template, $template_name)
	{
		return $this->db->where('template_name', $template_name)->update($this->table_email_template, $template);
	}
	public function update_code_of_conduct($template, $template_name)
	{
		return $this->db->where('template_name', $template_name)->update($this->table_email_template, $template);
	}

	public function add_time_slot($data)
	{
		return $this->db->insert($this->table_tournament_slots,$data);
	}

	public function get_all_time_slots()
	{
		return $this->db->select('*')
			->from($this->table_tournament_slots)
			->get()->result();
	}

	public function get_time_slots($name,$starting_time,$ending_time)
	{
		return $this->db->select('*')
			->from($this->table_tournament_slots)
			->where('name',$name)
			->where('starting_time',$starting_time)
			->where('ending_time',$ending_time)
			->get()->num_rows();

	}

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
	public function update_application_setting($id,$data)
	{
		return $this->db->where('id',$id)->update($this->table_application_settings,$data);
	}

	public function get_firebase_key()
	{
		return $this->db->select('*')
			->from($this->table_application_settings)
			->where('name','firebase_api_key')
			->get()->row();
	}
}
