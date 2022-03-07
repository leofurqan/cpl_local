<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invitation extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'admin/team_model',
			'admin/tournament_model'
		));
	}

	public function invitation($invitation_id)
	{
		$invitation = $this->team_model->get_team_invitation_by_id($invitation_id);
		if ($invitation->num_rows() > 0) {
			$data['invitation'] = $invitation->row();
			$data['tournament'] = $this->tournament_model->get_tournament_by_id($data['invitation']->tournament_id);
			$this->load->view('accept_invite', $data);
		} else {
			$this->load->view('error');
		}
	}

	public function pooling_invitation($invitation_id)
	{
		$pooling_invitation = $this->team_model->get_pooling_invitation_by_id($invitation_id);
		if ($pooling_invitation->num_rows() > 0) {
			$data['pooling_invitation'] = $pooling_invitation->row();
			$data['tournament'] = $this->tournament_model->get_tournament_by_id($data['pooling_invitation']->tournament_id);
			$this->load->view('accept_invite', $data);
		} else {
			$this->load->view('error');
		}
	}

	public function accept_invite()
	{
		$invitation = array(
			'status' => 1,
			'updated_date' => date('Y-m-d H:i:s')
		);
		$invitation_id = $this->input->post('invitation_id');

		if ($this->team_model->accept_team_invitation($invitation, $invitation_id)) {
			$result = $this->team_model->get_team_by_id($this->team_model->get_team_invitation_by_id($invitation_id)->row()->team_id);
			$template = $this->db->select('*')->from('email_templates')->where('template_name', 'invite_accept')->get()->row();
			$password = generate_string();
			$team_password = array('password' => sha1($password));
			if ($this->team_model->update_team($team_password, $result->id)) {
				preg_match_all('/{(\w+)}/', $template->template_value, $matches);
				$team_name_replace = str_replace($matches[0][0], ucfirst(strtolower($result->company_name)), $template->template_value);
				$team_email = str_replace($matches[0][1], $result->email, $team_name_replace);
				$team_password = str_replace($matches[0][2], $password, $team_email);
				$team_contact = str_replace($matches[0][3], $result->contact, $team_password);
				$final = str_replace($matches[0][4], $password, $team_contact);
				$team_login = '<br><a href="https://cpl.net.pk/team/login">Click to login</a>';
				$email_body = $final . $team_login;
				send_email($template->subject, $result->email, $email_body);
			}
			redirect(base_url('invitation/invitation/' . $invitation_id));
		}
	}
}
