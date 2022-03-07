<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teams extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/team_model',
			'admin/player_model'
		));
	}

	public function index()
	{
		$data['title'] = 'Team List';
		$data['teams'] = $this->team_model->get_all_teams();
		$data['view'] = $this->load->view('admin/teams/list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function players($team_id)
	{
		$data['title'] = 'Players List';
		$data['players'] = $this->player_model->get_player_by_team_id($team_id);
		$data['view'] = $this->load->view('admin/players/list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function add_team()
	{
		$data['title'] = 'Add Team';
		if ($this->input->post('submit') === "submit") {
			$config['upload_path'] = './uploads/teams/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('exception', 'Please Try Again');
			} else {
				$logo = $this->upload->data();
				$password = generate_string();

				$team = array(
					'company_name' => $this->input->post('company_name'),
					'manager_name' => $this->input->post('manager_name'),
					'display_name' => $this->input->post('display_name'),
					'category' => $this->input->post('category'),
					'email' => $this->input->post('email'),
					'email_2' => $this->input->post('email_2'),
					'email_3' => $this->input->post('email_3'),
					'password' => sha1($password),
					'contact' => $this->input->post('contact'),
					'contact_2' => $this->input->post('contact_2'),
					'contact_3' => $this->input->post('contact_3'),
					'address' => $this->input->post('address'),
					'logo' => $logo['file_name'],
					'description' => $this->input->post('description'),
					'facebook' => $this->input->post('facebook'),
					'twitter' => $this->input->post('twitter'),
					'status' => $this->input->post('status'),
					'created_date' => date('Y-m-d H:i:s')
				);
				if ($this->team_model->add_team($team)) {
					$template = $this->db->select('*')->from('email_templates')->where('template_name', 'registration')->get()->row();
					$email = $this->input->post('email');

					preg_match_all('/{(\w+)}/', $template->template_value, $matches);
					$team_name_replace = str_replace($matches[0][0], ucfirst(strtolower($this->input->post('company_name'))), $template->template_value);
					$team_login = '<br><a href="https://cpl.net.pk/team/login">Click to login</a>';

					$email_body = $team_name_replace.$team_login;

					send_email($template->subject,$email,$email_body);

				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}
			redirect('admin/teams');
		}
		$data['view'] = $this->load->view('admin/teams/add_team', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Team';
		$data['team'] = $this->team_model->get_team_by_id($id);
		if ($this->input->post('submit') === 'submit') {
			$config['upload_path'] = './uploads/teams/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('logo')) {
				$logo = $data['team']->logo;
			} else {
				$img_name = $data['team']->logo;
				unlink('./uploads/teams/' . $img_name);
				$logo = $this->upload->data()["file_name"];
			}
			$team = array(
				'company_name' => $this->input->post('company_name'),
				'manager_name' => $this->input->post('manager_name'),
				'display_name' => $this->input->post('display_name'),
				'category' => $this->input->post('category'),
				'email' => $this->input->post('email'),
				'email_2' => $this->input->post('email_2'),
				'email_3' => $this->input->post('email_3'),
				'contact' => $this->input->post('contact'),
				'contact_2' => $this->input->post('contact_2'),
				'contact_3' => $this->input->post('contact_3'),
				'address' => $this->input->post('address'),
				'description' => $this->input->post('description'),
				'facebook' => $this->input->post('facebook'),
				'twitter' => $this->input->post('twitter'),
				'logo' => $logo,
				'status' => $this->input->post('status'),
				'created_date' => date('Y-m-d H:i:s')
			);

			if ($this->team_model->update_team($team, $id)) {
				$this->session->set_flashdata('message', 'Updated Successfully');
				redirect('admin/teams/');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}


		}


		$data['view'] = $this->load->view('admin/teams/edit', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function delete($id)
	{
		if ($this->team_model->delete_team($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		$this->index();
	}

	public function change_password()
	{
		$data['title'] = 'Change Password';
		if ($this->input->post('submit') === 'submit') {
			$id = $this->input->post('team_id');
			$new_password = array('password' => sha1($this->input->post('new_password')));
			if ($this->team_model->change_password($new_password, $id)) {
				$this->session->set_flashdata('message', 'Password Changed Successfully');
			} else {
				$this->session->set_flashdata('exception', 'Something went wrong');
			}
		}
		$this->index();
//		$data['view'] = $this->load->view('admin/teams/change_password', $data, true);
//		$this->load->view('admin/template', $data);
	}


	/*AJAX Functions */
	function check_email()
	{
		$email = $this->input->post('email');
		$result = $this->team_model->check_email($email);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}

	function check_contact()
	{
		$contact = $this->input->post('contact');
		$result = $this->team_model->check_contact($contact);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}
		echo json_encode($response);
	}

	/*public function send_teams_credentials($id)
	{
		$email = $this->team_model->get_team_by_id($id)->email;
		$company_name = $this->team_model->get_team_by_id($id)->company_name;
		$contact = $this->team_model->get_team_by_id($id)->contact;

		$password = generate_string();
		$data['title'] = 'Team Credentials';
		$team_password = array('password' => sha1($password));
		if ($this->team_model->update_team($team_password, $id)) {
			$this->load->library('phpmailer_library');
			$mail = $this->phpmailer_library->load();
			$mail->isSMTP();
			$mail->Host = 's26.hosterpk.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'marketing@cpl.net.pk';
			$mail->Password = 'lahore@786';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->setFrom('marketing@cpl.net.pk', 'CPS Club');
			$mail->addBcc('marketing@cpl.net.pk');
			// Email subject
			$mail->Subject = 'Login Credentials';

			// Set email format to HTML
			$mail->isHTML(true);

			// Add a recipient
			$mail->addAddress($email);
			$mail->addBcc('marketing@cpl.net.pk');
			$mail->Body = 'Dear ' . $company_name . ',<br>Your team management login details as under <br>Login: ' . $email . ' <br>Contact: ' . $contact . ' <br>Password: ' . $password . '<br><a href="https://cpl.net.pk/team/login">Web link for team management</a><br>Download Android application from the following button<br><a href="https://play.google.com/store/apps/details?id=atech.solutions.cplteam"><img src="' . base_url('assets/media/cpl/app_download.png') . '"/></a>'.'<br><img width="25%" src="' . base_url('assets/media/cpl/signature.jpeg') . '"/>';

			// Send email
			if (!$mail->send()) {
				$this->session->set_flashdata('exception', 'Something went wrong...');
			} else {
				$this->session->set_flashdata('message', 'Login Credentials sent successfully');
			}
		} else {
			$this->session->set_flashdata('exception', 'Something went wrong...');
		}

		redirect('admin/teams');
	}*/


	public function send_team_credentials()
	{
		$emails = json_decode($this->input->post('email'), true);
		$template = $this->db->select('*')->from('email_templates')->where('template_name', 'login_credentials')->get()->row();

		foreach ($emails as $email) {
			$company_name = $this->team_model->get_team_by_email($email)->company_name;
			$contact = $this->team_model->get_team_by_email($email)->contact;

			$password = generate_string();
			$data['title'] = 'Team Credentials';
			$team_password = array('password' => sha1($password));
			if ($this->team_model->update_team($team_password, $this->team_model->get_team_by_email($email)->id)) {
				preg_match_all('/{(\w+)}/', $template->template_value, $matches);
				$team_name_replace = str_replace($matches[0][0], ucfirst(strtolower($company_name)), $template->template_value);
				$team_email = str_replace($matches[0][1], $email, $team_name_replace);
				$team_password = str_replace($matches[0][2], $password, $team_email);
				$team_contact = str_replace($matches[0][3], $contact, $team_password);
				$final = str_replace($matches[0][4], $password, $team_contact);
				$team_login = '<br><a href="https://cpl.net.pk/team/login">Click to login</a>';
				$email_body = $final.$team_login;
				send_email($template->subject, $email,$email_body);

			}

		}
		echo json_encode(true);
	}

	public function get_team_detail()
	{
		$id = $this->input->post('id');
		$result = $this->team_model->get_team_detail($id);
		echo json_encode($result);
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1) {
			$data = array('status' => 0);
			$result = $this->team_model->update_team($data, $id);
			echo json_encode($result);
		} else {
			$data = array('status' => 1);
			$result = $this->team_model->update_team($data, $id);
			echo json_encode($result);
		}


	}

}

