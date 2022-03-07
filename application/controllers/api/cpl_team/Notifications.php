<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Notifications extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'notification_model'
		));
	}

	public function notifications_get()
	{
		$team_id = $this->input->get("team_id");
		if (!empty($team_id)) {
			$notifications = $this->notification_model->getNotificationsByTeamID($team_id);

			$this->response(array(
				'status' => TRUE,
				'notifications' => $notifications,
			), 200);
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Invalid Request',
			), 404);
		}
	}
}
