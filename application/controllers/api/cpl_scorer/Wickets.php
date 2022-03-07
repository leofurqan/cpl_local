<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Wickets extends RestController
{
	function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'api/wickets_model'
		));
	}

	public function wicketsType_get()
	{
		$wicket_types = $this->wickets_model->getAllWicketsType();
		$this->response(array(
			'status' => TRUE,
			'wickets_type' => $wicket_types
		), 200);
	}
}
