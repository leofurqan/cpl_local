<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'admin/setting_model',
			'admin/tournament_model'
		));
	}

	public function email_templates()
	{
		$data['title'] = 'Email Templates';
		if ($this->input->post('submit') === 'submit') {
			$template_name = $this->input->post('template_name');
			$template = array(
				'subject' => $this->input->post('subject'),
				'template_value' => $this->input->post('template_value'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->setting_model->update_email_template($template, $template_name)) {
				$this->session->set_flashdata('message', 'Template Updated Successfully');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}

		$data['email_templates'] = $this->setting_model->get_all_email_templates();
		$data['view'] = $this->load->view('admin/settings/email_template', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function login_credentials()
	{
		$data['title'] = 'Login Credentials Templates';
		if ($this->input->post('submit') === 'submit') {
			$template_name = $this->input->post('template_name');
			$login_credentials = array(
				'subject' => $this->input->post('subject'),
				'template_value' => $this->input->post('template_value'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->setting_model->update_login_template($login_credentials, $template_name)) {
				$this->session->set_flashdata('message', 'Template Updated Successfully');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}

		$data['login_credentials'] = $this->setting_model->get_all_login_templates();
		$data['view'] = $this->load->view('admin/settings/email_template', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function registration()
	{
		$data['title'] = 'Registration Templates';
		if ($this->input->post('submit') === 'submit') {
			$template_name = $this->input->post('template_name');
			$registration = array(
				'subject' => $this->input->post('subject'),
				'template_value' => $this->input->post('template_value'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->setting_model->update_registration_template($registration, $template_name)) {
				$this->session->set_flashdata('message', 'Template Updated Successfully');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}

		$data['registration'] = $this->setting_model->get_all_registration_templates();
		$data['view'] = $this->load->view('admin/settings/email_template', $data, true);
		$this->load->view('admin/template', $data);
	}


	public function general()
	{
		$data['title'] = 'SMS API';
		if ($this->input->post('submit') === 'submit') {
			$sms_api = $this->input->post('sms_api');

			if($this->input->post('sms_api')==='on'){
				$general = array(
					'sms_api' => 1,
					'created_date' => date('Y-m-d H:i:s')
				);

			}else{
				$general = array(
					'sms_api' => 0,
					'created_date' => date('Y-m-d H:i:s')
				);

			}


			if ($this->setting_model->update_sms_api($general, '1')) {
				$this->session->set_flashdata('message', ' Updated Successfully');
				redirect('admin/dashboard/');
			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}

		$data['general'] = $this->setting_model->get_all_sms_api();

		$data['view'] = $this->load->view('admin/settings/general', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function cps_rules()
	{
			$data['title'] = 'Sms Template';
		if ($this->input->post('submit') === "submit") {
			$template_name = $this->input->post('template_name');
			$cps_rules = array(
				'template_value' => $this->input->post('template_value'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->tournament_model->update_cps_rules($cps_rules,$template_name)) {
				$this->session->set_flashdata('success', 'Added successfully');
			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}


		}
		$data['cps_rules'] = $this->tournament_model->get_cps_rules();

		$data['view'] = $this->load->view('admin/settings/email_template', $data, true);
		$this->load->view('admin/template', $data);

	}
	public function code_of_conduct()
	{
		$data['title'] = 'Code of Conduct';
		if ($this->input->post('submit') == "submit") {
			$template_name = $this->input->post('template_name');
			$code_of_conduct = array(
				'template_value' => $this->input->post('template_value'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->tournament_model->update_code_of_conduct($code_of_conduct,$template_name)) {
				$this->session->set_flashdata('success', 'Updated successfully');
			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}


		}
		$data['code_of_conduct'] = $this->tournament_model->get_code_of_conduct();
		$data['view'] = $this->load->view('admin/settings/email_template', $data, true);
		$this->load->view('admin/template', $data);

	}
	public function sms_api()
	{
		$data['title'] = 'Sms API';
		if ($this->input->post('submit') == "submit") {
			$api_info = array(
				'msid' => $this->input->post('msid'),
				'short_code' => $this->input->post('short_code'),
				'language' => $this->input->post('language'),
				'password' => $this->input->post('password'),
				'message_type' => $this->input->post('message_type'),
				'url' => $this->input->post('url'),

				'created_date' => date('Y-m-d H:i:s')
			);

			if ($this->setting_model->update_api_info($api_info,'1')) {
				$this->session->set_flashdata('success', 'Updated successfully');
				redirect('admin/dashboard/');
			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}


		}
		$data['api_info'] = $this->setting_model->get_api_info();

		$data['view'] = $this->load->view('admin/settings/sms_api', $data, true);
		$this->load->view('admin/template', $data);

	}

	public function tournament_slots()
	{
		$data['title'] = 'Tournament Slots';
		$data['time_slots'] = $this->setting_model->get_all_time_slots();
		if ($this->input->post('submit')) {
			if ($this->setting_model->get_time_slots($this->input->post('time_slot_name')
					, $this->input->post('starting_time'), $this->input->post('ending_time')) > 0) {

				$this->session->set_flashdata('exception', 'Time slot already exists');
			} else {

				$data = array(
					'name' => $this->input->post('time_slot_name'),
					'starting_time' => $this->input->post('starting_time'),
					'ending_time' => $this->input->post('ending_time')
				);
				if ($this->setting_model->add_time_slot($data)) {
					$this->session->set_flashdata('success', 'Updated successfully');
					redirect('admin/settings/tournament_slots');
				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}
		}
		$data['view'] = $this->load->view('admin/settings/tournament_slots_list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function application_settings()
	{
		$data['title'] = 'Application Settings';
		$data['application_settings'] = $this->setting_model->get_all_application_settings();
		$data['view'] = $this->load->view('admin/settings/application_settings', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function get_application_setting_by_id()
	{
		$id = $this->input->post('id');
		$result = $this->setting_model->get_application_setting_by_id($id);
		echo json_encode($result);

	}

	public function update_settings()
	{
		if ($this->input->post('submit')) {
			$id = $this->input->post('setting_id');
				$data = array(
					'name' => $this->input->post('application_setting_name'),
					'value' => $this->input->post('application_setting_value'),
				);
				if ($this->setting_model->update_application_setting($id,$data)) {
					$this->session->set_flashdata('success', 'Updated successfully');
					redirect('admin/settings/application_settings');
				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}
		}
}
