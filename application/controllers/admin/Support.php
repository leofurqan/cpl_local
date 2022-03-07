<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Support extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/support_model',
			'admin/team_model'
		));
	}

	public function index()
	{
		$data['title'] = 'Support';
		$data['request'] = $this->support_model->get_all_request();

		$data['view'] = $this->load->view('admin/support/requests', $data, true);
		$this->load->view('admin/template', $data);
	}
	public function send_request_approval($id,$team_id)
	{
		$email = $this->team_model->get_team_by_id($team_id)->email;

		$company_name = $this->team_model->get_team_by_id($team_id)->company_name;
		$data['title'] = 'Request Approval ';
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
			$mail->Subject = 'Request Approval';

			// Set email format to HTML
			$mail->isHTML(true);

			// Add a recipient
			$mail->addAddress($email);
			$mail->addBcc('marketing@cpl.net.pk');
			$mail->Body = 'Dear ' . $company_name . ',<br>We have notice your request.We will notify you soon about this request.<br>Download Android application from the following button<br><a href="https://play.google.com/store/apps/details?id=atech.solutions.cplteam"><img src="' . base_url('assets/media/cpl/app_download.png') . '"/></a>' . '<br><img width="25%" src="' . base_url('assets/media/cpl/signature.jpeg') . '"/>';

			// Send email
			if ($mail->send()) {
				$status = array('status' => 1);
				if ($this->support_model->update_status($status, $id)) {
					$this->session->set_flashdata('message', 'Request Approval Email Sent Successfully');

				}
			} else {
				$this->session->set_flashdata('exception', 'Something went wrong...');
			}
	redirect('admin/support');

	}


}

