<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pooling extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/pooling_model',
			'admin/tournament_model'
		));
	}

	public function index()
	{

	}


	public function add_pooling()
	{
		if ($this->input->post('submit')) {
			$tournament_id = $this->input->post('tournament_id');
			if ($this->pooling_model->get_pooling_by_tournament_id($tournament_id)) {
				$this->pooling_model->del_pooling_by_tournament_id($tournament_id);
			}
			$pooling = array(
				'tournament_id' => $tournament_id,
				'no_of_pools' => $this->input->post('no_of_pools'),
				'pooling_formate' => $this->input->post('pool_format'),
				'created_date' => date('Y-m-d H:i:s')
			);
			if ($this->pooling_model->add_pooling($pooling)) {
				if ($this->pooling_model->get_pools_by_tournament_id($tournament_id)) {
					$this->pooling_model->del_pools_by_tournament_id($tournament_id);
				}
				$last_insert_id = $this->pooling_model->get_max_id()->id;
				$no_of_pools = $this->input->post('no_of_pools');
				if ($no_of_pools == 1) {
					$data = array(
						'pooling_id' => $last_insert_id,
						'tournament_id' => $tournament_id,
						'pools_name' => 'A',
						'created_date' => date('Y-m-d H:i:s')
					);

					$this->pooling_model->add_pools($data);
				} else if ($no_of_pools == 2) {
					for ($i = 0; $i < $no_of_pools; $i++) {
						if ($i == 0) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'A',
								'created_date' => date('Y-m-d H:i:s')
							);
						} elseif ($i == 1) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'B',
								'created_date' => date('Y-m-d H:i:s')
							);
						}
						$this->pooling_model->add_pools($data);
					}

				} elseif ($no_of_pools == 3) {
					for ($i = 0; $i < $no_of_pools; $i++) {
						if ($i == 0) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'A',
								'created_date' => date('Y-m-d H:i:s')
							);
						} elseif ($i == 1) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'B',
								'created_date' => date('Y-m-d H:i:s')
							);
						} elseif ($i == 2) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'C',
								'created_date' => date('Y-m-d H:i:s')
							);
						}
						$this->pooling_model->add_pools($data);
					}
				} elseif ($no_of_pools == 4) {
					for ($i = 0; $i < $no_of_pools; $i++) {
						if ($i == 0) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'A',
								'created_date' => date('Y-m-d H:i:s')
							);
						} elseif ($i == 1) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'B',
								'created_date' => date('Y-m-d H:i:s')
							);
						} elseif ($i == 2) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'C',
								'created_date' => date('Y-m-d H:i:s')
							);
						} elseif ($i == 3) {
							$data = array(
								'pooling_id' => $last_insert_id,
								'tournament_id' => $tournament_id,
								'pools_name' => 'D',
								'created_date' => date('Y-m-d H:i:s')
							);
						}
						$this->pooling_model->add_pools($data);
					}
				}
				$this->session->set_flashdata('message', 'Added Successfully');
				redirect('admin/tournaments/manage_tournament/pooling' . $tournament_id);
			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}
	}


	public function start_pooling($pooling_formate, $id, $pooling_id)
	{
		if ($pooling_formate == 'manual') {
			$data['teams_data'] = $this->pooling_model->get_teams_by_tournament_id($id);
			$data['tournament_id'] = $id;
			$data['pooling_names'] = $this->pooling_model->get_pools_by_pooling_id($pooling_id);
			$this->load->view('admin/tournaments/manual_pooling_2', $data);

		}
	}

	public function add_teams_pools()
	{
		if ($this->input->post('save')) {
			$teams = $this->input->post('team_id');
			for ($i = 0; $i < count($teams); $i++) {
				$data = array(
					'team_id' => $teams[$i],
					'team_pool_tournament_id' => $this->input->post('tournament_id'),
					'pool_id' => $this->input->post('pools_id')[$i],
					'created_date' => date('Y-m-d H:i:s')
				);
				if ($this->pooling_model->add_teams_pools($data)) {
					$data = array(
						'tournament_status' => 1,
					);
					if ($this->tournament_model->edit_tournament($data, $this->input->post('tournament_id'))) {
						$this->session->set_flashdata('message', 'Pooling Successfully added');
					} else {
						$this->session->set_flashdata('exception', 'Please try Again');
					}
				} else {
					$this->session->set_flashdata('exception', 'Please try Again');
				}
			}
			redirect('admin/tournaments');
		}
	}

	/*
	 * AJAX Functions
	 */

	public function check_pools()
	{
		$tournament_id = $this->input->post('tournament_id');
		$pools = $this->input->post('pools');
		$team_count = $this->tournament_model->get_team_count_by_tournament_id($tournament_id);
		if ($team_count % $pools === 0) {
			echo "true";
		} else {
			echo "false";
		}
	}
}
