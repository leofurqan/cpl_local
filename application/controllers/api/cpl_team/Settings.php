<?php

use chriskacerguis\RestServer\RestController;

class Settings extends RestController
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'api/cpl_team/settings_model'
		));
	}

	public function application_settings_get()
	{
		$result = $this->settings_model->get_all_application_settings();
		if ($result) {
			$this->response(array(
				'status' => TRUE,
				'data' => $result
			), 200);
		} else {
			$this->response(array(
				'status' => false,
				'message' => 'Something went wrong'
			), 200);
		}

	}

	public function application_settings_by_id_get()
	{
		$id = $this->input->get('id');
		if (!empty($id)) {
			$result = $this->settings_model->get_application_setting_by_id($id);
			if ($result) {
				$this->response(array(
					'status' => TRUE,
					'data' => $result
				), 200);
			} else {
				$this->response(array(
					'status' => false,
					'message' => 'Something went wrong'
				), 200);
			}
		} else {
			$this->response(array(
				'status' => false,
				'message' => 'Invalid Request'
			), 404);
		}

	}
}
