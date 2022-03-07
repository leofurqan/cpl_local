<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Authentication extends RestController
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'api/cpl_scorer/authentication_model',
			'api/cpl_scorer/matches_model'
		));
	}

	public function login_post()
	{
		$data["phone"] = $this->input->post('phone');
		$data["password"] = sha1($this->input->post('password'));

		if (!empty($data["phone"]) && !empty($data["password"])) {
			$official = $this->authentication_model->getOfficial($data);
			if ($official->num_rows() === 1) {
				$this->response(array(
					'status' => TRUE,
					'user' => $official->row()
				), 200);
			} else {
				$this->response(array(
					'status' => FALSE,
					'message' => 'Phone or Password is incorrect',
				), 200);
			}
		} else {
			$this->response(array(
				'status' => FALSE,
				'message' => 'Phone or Password not provided',
			), 404);
		}
	}
}
