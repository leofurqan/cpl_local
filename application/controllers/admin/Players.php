<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Players extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/player_model',
		));
	}

	public function overview($id)
	{
		$data['title'] = 'Player Profile';
		$data['player'] = $this->player_model->get_player_by_id($id);
		$data['view'] = $this->load->view('admin/players/profile', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function batting_stats($id)
	{
		$data['title'] = 'Player Batting Stats';
		$data['player'] = $this->player_model->get_player_by_id($id);
		$data['view'] = $this->load->view('admin/players/batting_stats', $data, true);
		$this->load->view('admin/template', $data);
	}
}

