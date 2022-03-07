<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tournaments extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/tournament_model',
			'admin/club_model',
			'admin/ground_model',
			'admin/team_model',
			'notification_model',
			'admin/matches_model',
			'admin/pooling_model',
			'admin/setting_model',
		));
	}

	public function index()
	{
		$data['title'] = 'Tournament List';
		$data['tournaments'] = $this->tournament_model->get_all_tournaments();
		$data['view'] = $this->load->view('admin/tournaments/list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function add_tournament()
	{
		$data['title'] = 'Add Tournament';

		if ($this->input->post('submit') === 'submit') {
			$config['upload_path'] = './uploads/tournaments/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('exception', $this->upload->display_errors());
			} else {
				$logo = $this->upload->data();

				$config['upload_path'] = './uploads/tournaments_files/';
				$config['allowed_types'] = 'pdf|docx|xlsx';
				$config['max_size'] = 2048;
				$config['max_width'] = 0;
				$config['max_height'] = 0;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('rules')) {
					$this->session->set_flashdata('exception', $this->upload->display_errors());
				} else {
					$rules = $this->upload->data();
					$config['upload_path'] = './uploads/tournaments_files/';
					$config['allowed_types'] = 'pdf|docx|xlsx';
					$config['max_size'] = 2048;
					$config['max_width'] = 0;
					$config['max_height'] = 0;
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('code_conduct')) {
						$this->session->set_flashdata('exception', $this->upload->display_errors());
					} else {
						$code_conduct = $this->upload->data();
						$config['upload_path'] = './uploads/tournaments_files/';
						$config['allowed_types'] = 'pdf|docx|xlsx';
						$config['max_size'] = 2048;
						$config['max_width'] = 0;
						$config['max_height'] = 0;
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if (!$this->upload->do_upload('invitation')) {
							$this->session->set_flashdata('exception', $this->upload->display_errors());
						} else {
							$invitation = $this->upload->data();
							$tournaments = array(
								'club_id' => $this->input->post('club_name'),
								'tournament_name' => $this->input->post('tournament_name'),
								'tournament_format_id' => $this->input->post('tournament_format'),
								'tournament_points_id' => $this->input->post('tournament_points'),
								'no_teams' => $this->input->post('no_teams'),
								'min_squad' => $this->input->post('min_squad'),
								'max_squad' => $this->input->post('max_squad'),
								'starting_date' => $this->input->post('starting_date'),
								'squad_submission_date' => $this->input->post('squad_submission_date'),
								'logo' => $logo['file_name'],
								'rules' => $rules['file_name'],
								'code_conduct' => $code_conduct['file_name'],
								'invitation' => $invitation['file_name'],
								'status' => $this->input->post('status'),
								'created_date' => date('Y-m-d H:i:s')
							);

							if ($this->tournament_model->add_tournament($tournaments)) {
								$this->session->set_flashdata('message', 'Tournament Added');
							} else {
								$this->session->set_flashdata('exception', 'Please try Again');
							}
						}
					}
				}
			}

			redirect('admin/tournaments');
		}

		$data['tournament_format'] = $this->tournament_model->get_all_tournament_formats();
		$data['tournament_points'] = $this->tournament_model->get_all_point_system();
		$data['clubs'] = $this->club_model->get_all_clubs();
		$data['view'] = $this->load->view('admin/tournaments/add', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function edit_tournament($id)
	{
		$data['title'] = 'Edit Tournament';
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($id);
		$data['tournament_format'] = $this->tournament_model->get_all_tournament_formats();
		$data['tournament_points'] = $this->tournament_model->get_all_point_system();
		$data['clubs'] = $this->club_model->get_all_clubs();

		if ($this->input->post('submit') === 'submit') {
			$config['upload_path'] = './uploads/tournaments/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('logo')) {
				$logo = $data['tournament']->logo;
			} else {
				$img_name = $data['tournament']->logo;
				unlink('./uploads/tournaments/' . $img_name);
				$logo = $this->upload->data()["file_name"];
			}

			$config['upload_path'] = './uploads/tournaments_files/';
			$config['allowed_types'] = 'pdf|docx|xlsx';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('rules')) {
				$rules = $data['tournament']->rules;
			} else {
				$rules = $this->upload->data()["file_name"];

			}
			$config['upload_path'] = './uploads/tournaments_files/';
			$config['allowed_types'] = 'pdf|docx|xlsx';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('code_conduct')) {
				$code_conduct = $data['tournament']->code_conduct;
			} else {
				$code_conduct = $this->upload->data()["file_name"];
			}
			$config['upload_path'] = './uploads/tournaments_files/';
			$config['allowed_types'] = 'pdf|docx|xlsx';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('invitation')) {
				$invitation = $data['tournament']->invitation;
			} else {
				$invitation = $this->upload->data()["file_name"];
			}
			$tournaments = array(
				'club_id' => $this->input->post('club_name'),
				'tournament_name' => $this->input->post('tournament_name'),
				'tournament_format_id' => $this->input->post('tournament_format'),
				'tournament_points_id' => $this->input->post('tournament_points'),
				'no_teams' => $this->input->post('no_teams'),
				'min_squad' => $this->input->post('min_squad'),
				'max_squad' => $this->input->post('max_squad'),
				'starting_date' => $this->input->post('starting_date'),
				'squad_submission_date' => $this->input->post('squad_submission_date'),
				'logo' => $logo,
				'rules' => $rules,
				'code_conduct' => $code_conduct,
				'invitation' => $invitation,
				'status' => $this->input->post('status'),
				'created_date' => date('Y-m-d H:i:s')
			);
			if ($this->tournament_model->edit_tournament($tournaments, $id)) {
				$this->session->set_flashdata('message', 'Tournament Updated');
				redirect('admin/tournaments');
			} else {
				$this->session->set_flashdata('exception', 'Please try Again');
			}
		}

		$data['view'] = $this->load->view('admin/tournaments/edit', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function tournament_rules()
	{
		$data['title'] = 'Tournament Rules';
		$data['tournament_rules'] = $this->tournament_model->get_all_tournament_formats();
		$data['view'] = $this->load->view('admin/tournaments/rules_list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function point_system()
	{
		$data['title'] = 'Point System';
		$data['point_system'] = $this->tournament_model->get_all_point_system();
		$data['view'] = $this->load->view('admin/tournaments/points_list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function add_point_system()
	{
		$data['title'] = 'Add Point System';

		if ($this->input->post('submit') === 'submit') {
			$points = array(
				'name' => $this->input->post('name'),
				'on_run' => $this->input->post('on_run'),
				'on_wicket' => $this->input->post('on_wicket'),
				'on_catch' => $this->input->post('on_catch'),
				'on_stump' => $this->input->post('on_stump'),
				'on_six' => $this->input->post('on_six'),
				'on_win' => $this->input->post('on_win'),
				'on_loss' => $this->input->post('on_loss'),
				'on_tie' => $this->input->post('on_tie'),
				'on_fifty' => $this->input->post('on_fifty'),
				'on_hundred' => $this->input->post('on_hundred'),
				'on_oneTwentyfive' => $this->input->post('on_oneTwentyfive'),
				'on_oneFifty' => $this->input->post('on_oneFifty'),
				'three_wickets' => $this->input->post('three_wickets'),
				'four_wickets' => $this->input->post('four_wickets'),
				'five_wickets' => $this->input->post('five_wickets'),
				'six_wickets' => $this->input->post('six_wickets'),
				'created_date' => date('Y-m-d H:i:s')
			);


			if ($this->tournament_model->add_point_system($points)) {
				$this->session->set_flashdata('message', 'Tournament Points Added');
				redirect('admin/tournaments/point_system');
			} else {
				$this->session->set_flashdata('exception', 'Please try Again');
			}
		}

		$data['view'] = $this->load->view('admin/tournaments/add_points', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function add_tournament_rules()
	{
		$data['title'] = 'Add Formate';

		if ($this->input->post('submit') === 'submit') {
			$rules = array(
				'name' => $this->input->post('name'),
				'max_over' => $this->input->post('max_over'),
				'maximum_over' => $this->input->post('maximum_over'),
				'no_ball' => $this->input->post('no_ball'),
				'wide_ball' => $this->input->post('wide_ball'),
				'max_balls' => $this->input->post('max_balls'),
				'free_hit' => $this->input->post('free_hit'),
				'created_date' => date('Y-m-d H:i:s')
			);


			if ($this->tournament_model->add_tournament_rules($rules)) {
				$this->session->set_flashdata('message', 'Tournament Rules Added');
				redirect('admin/tournaments/tournament_rules');
			} else {
				$this->session->set_flashdata('exception', 'Please try Again');
			}
		}

		$data['view'] = $this->load->view('admin/tournaments/add_rules', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function edit_point_system($id)
	{
		$data['title'] = 'Edit Point System';

		if ($this->input->post('submit') === 'submit') {
			$points = array(
				'name' => $this->input->post('name'),
				'on_run' => $this->input->post('on_run'),
				'on_wicket' => $this->input->post('on_wicket'),
				'on_catch' => $this->input->post('on_catch'),
				'on_stump' => $this->input->post('on_stump'),
				'on_six' => $this->input->post('on_six'),
				'on_win' => $this->input->post('on_win'),
				'on_loss' => $this->input->post('on_loss'),
				'on_tie' => $this->input->post('on_tie'),
				'on_fifty' => $this->input->post('on_fifty'),
				'on_hundred' => $this->input->post('on_hundred'),
				'on_oneTwentyfive' => $this->input->post('on_oneTwentyfive'),
				'on_oneFifty' => $this->input->post('on_oneFifty'),
				'three_wickets' => $this->input->post('three_wickets'),
				'four_wickets' => $this->input->post('four_wickets'),
				'five_wickets' => $this->input->post('five_wickets'),
				'six_wickets' => $this->input->post('six_wickets'),
				'created_date' => date('Y-m-d H:i:s'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->tournament_model->edit_point_system($points, $id)) {
				$this->session->set_flashdata('message', 'Tournament Points Updated');
				redirect('admin/tournaments/point_system');
			} else {
				$this->session->set_flashdata('exception', 'Please try Again');
			}
		}

		$data['points'] = $this->tournament_model->get_point_system_by_id($id);
		$data['view'] = $this->load->view('admin/tournaments/edit_points', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function edit_tournament_rules($id)
	{
		$data['title'] = 'Edit Formate';

		if ($this->input->post('submit') === 'submit') {
			$rules = array(
				'name' => $this->input->post('name'),
				'max_over' => $this->input->post('max_over'),
				'maximum_over' => $this->input->post('maximum_over'),
				'no_ball' => $this->input->post('no_ball'),
				'wide_ball' => $this->input->post('wide_ball'),
				'max_balls' => $this->input->post('max_balls'),
				'free_hit' => $this->input->post('free_hit'),
				'created_date' => date('Y-m-d H:i:s'),
				'updated_date' => date('Y-m-d H:i:s')
			);

			if ($this->tournament_model->edit_tournament_rules($rules, $id)) {
				$this->session->set_flashdata('message', 'Tournament Rules Updated');
				redirect('admin/tournaments/tournament_rules');
			} else {
				$this->session->set_flashdata('exception', 'Please try Again');
			}
		}

		$data['rules'] = $this->tournament_model->get_tournament_rules_by_id($id);
		$data['view'] = $this->load->view('admin/tournaments/edit_rules', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function delete_tournament_rules($id)
	{
		if ($this->tournament_model->delete_tournament_rules($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please try Again');
		}

		redirect('admin/tournaments');
	}

	public function delete_point_system($id)
	{
		if ($this->tournament_model->delete_point_system($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please try Again');
		}

		redirect('admin/tournaments');
	}

	public function reserve_ground($id)
	{
		$data['title'] = 'Reserve Ground';
		if ($this->input->post('submit') === "submit") {
			$grounds = array(
				'ground_id' => $this->input->post('ground_name'),
				'created_date' => $this->input->post('date'),
				'tournament_id' => $id

			);
			if ($this->tournament_model->reserve_ground($grounds)) {
				$this->session->set_flashdata('message', 'Added Successfully');
				redirect('admin/tournaments');

			} else {
				$this->session->set_flashdata('exception', 'Please try Again');
			}
		}
		$data['grounds'] = $this->ground_model->get_all_grounds();
		$data['tournament_id'] = $id;
		$data['view'] = $this->load->view('admin/tournaments/ground_reservation', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function delete($id)
	{
		if ($this->tournament_model->delete_tournament($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please try Again');
		}

		redirect('admin/tournaments');
	}

	public function team_details($id)
	{
		$data['title'] = 'Team Details';
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($id);
		$data['teams'] = $this->team_model->get_all_teams();
		$data['view'] = $this->load->view('admin/tournaments/team_details', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function manage_tournament($page, $id)
	{
		$t = $this->tournament_model->get_tournament_by_id($id)->tournament_name;
		$data['title'] = $t;
		$data['page'] = $page;
		$data['tournament_id'] = $id;
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($id);
		$data['count_of_confirmed_teams'] = $this->tournament_model->get_count_of_confirmed_teams($id);
		$data['no_of_reserved_ground'] = $this->tournament_model->get_no_of_reserved_grounds_by_id($id);
		$data['teams_pools'] = $this->pooling_model->get_team_pool_mapping($id);
		if ($page === 'home') {
			$data['batsman_score'] = $this->tournament_model->get_batsman_score_by_tournament_id($id);
			$data['extra_runs'] = $this->tournament_model->get_extra_runs_tournament_id($id);
			$data['wickets'] = $this->tournament_model->get_wickets_by_tournament_id($id);
			$data['fours'] = $this->tournament_model->get_four_runs_tournament_id($id);
			$data['six'] = $this->tournament_model->get_six_runs_tournament_id($id);
			$data['hundreds'] = $this->tournament_model->get_no_of_hundreds_by_tournament_id($id)->num_of_hundreds;
			$data['fifties'] = $this->tournament_model->get_no_of_fifties_by_tournament_id($id)->num_of_fifties;
			$data['max_score'] = $this->tournament_model->get_max_score_by_tournament_id($id)->max_score;
			$data['max_wickets'] = $this->tournament_model->get_max_wickets_by_tournament_id($id)->max_wickets;
			$data['top_5_batsman'] = $this->tournament_model->get_top_5_batsman_by_tournament_id($id);

			$data['top_5_bowlers'] = $this->tournament_model->get_top_5_bowler_by_tournament_id($id);
			$data['top_5_sixes'] = $this->tournament_model->get_top_5_sixes_by_tournament_id($id);

		}
		if ($page === 'detail') {
			$data['tournament'] = $this->tournament_model->get_tournament_by_id($id);
			$data['teams'] = $this->team_model->get_all_teams();
			$data['live_matches'] = $this->matches_model->get_all_live_matches();
			$data['tournament_format'] = $this->tournament_model->get_all_tournament_formats();
			$data['tournament_points'] = $this->tournament_model->get_all_point_system();
		}
		if ($page == 'teams') {
			$data['tournament'] = $this->tournament_model->get_tournament_by_id($id);
			$data['pooling'] = $this->pooling_model->get_pooling_by_tournament_id($id);
			$data['invite_not_sent_teams'] = $this->tournament_model->get_not_sent_teams_from_tournament_mapping($id);
			$data['invite_sent_teams'] = $this->tournament_model->get_sent_teams_from_tournament_mapping($id);
			$data['invite_accepted_teams'] = $this->tournament_model->get_accepted_teams_from_tournament_mapping($id);
			$data['invite_confirmed_teams'] = $this->tournament_model->get_confirmed_teams_from_tournament_mapping($id);
			$data['teams'] = $this->team_model->get_all_teams();
		}
		if ($page == 'pooling') {
			$data['pooling_data'] = $this->pooling_model->get_pooling_by_tournament_id($id);
			$pooling = $this->pooling_model->get_team_pool_mapping($id);
			if ($pooling > 0) {
				$data['pools'] = $this->pooling_model->get_no_of_pools_by_tournament_id($id);
				$data['pooling_complete'] = true;
			} else {
				$data['pooling_complete'] = false;
			}
		}
		if ($page === 'scheduling') {
			if ($this->tournament_model->get_scheduling_by_tournament_id($id) > 0) {
				$data['status'] = true;
				$data['pools'] = $this->matches_model->get_pools_by_tournament_id($id);
				$data['grounds'] = $this->matches_model->get_all_grounds();
				$data['coordinators'] = $this->matches_model->get_all_coordinator();
				$data['commentators'] = $this->matches_model->get_all_commentators();
				$data['scorers'] = $this->matches_model->get_all_scorers();
				$data['umpires'] = $this->matches_model->get_all_umpires();
				$data['matches'] = $this->matches_model->get_all_matches_by_tournament($id);
				$data['time_slots'] = $this->tournament_model->get_all_slots_by_tournament_id($id);
			} else {
				$data['status'] = false;
				$data['match_formats'] = $this->tournament_model->get_all_match_format();
				$data['time_slots'] = $this->tournament_model->get_all_slots();
			}
		}
		if ($page == 'ground_reservation') {
			$data['reserved_ground'] = $this->ground_model->get_reserve_grounds_by_tournament_id($id);
			$data['grounds'] = $this->ground_model->get_all_grounds();
		}
		$data['view'] = $this->load->view('admin/tournaments/manage_tournament', $data, true);
		$this->load->view('admin/template', $data);
	}


	public function confirmed_team_list($id)
	{
		$data['title'] = 'Tournament Teams';
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($id);
		$data['teams'] = $this->tournament_model->get_all_confirmed_teams($id);
		$data['view'] = $this->load->view('admin/tournaments/confirmed_teams', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function squad($tournament_id, $team_id)
	{
		$data['title'] = 'Squad';
		$data['squad'] = $this->tournament_model->get_squad_by_tournament_team_id($tournament_id, $team_id);
		$data['view'] = $this->load->view('admin/squad/list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function print_list($tournament_id, $team_id)
	{
		$data['title'] = 'Tournament Squad List';
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($tournament_id);
		$data['team'] = $this->tournament_model->get_team_by_id($team_id);
		$data['squad'] = $this->tournament_model->get_squad_by_tournament_team_id($tournament_id, $team_id);
		$data['view'] = $this->load->view('admin/squad/print_list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function print_reserved_squad($tournament_id)
	{
		$data['title'] = 'Reserved Ground List';
		$data['tournament'] = $this->tournament_model->get_tournament_by_id($tournament_id);
		$data['reserved_ground'] = $this->ground_model->get_reserve_grounds_by_tournament_id($tournament_id);
		$data['view'] = $this->load->view('admin/tournaments/reserve_ground_print', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function reset_match_scheduling($tournament_id, $match_id)
	{
		if ($this->tournament_model->reset_match_schedule($match_id)) {
			$this->session->set_flashdata('message', 'Match reset successfully');
		} else {
			$this->session->set_flashdata('exception', 'Something went wrong');
		}

		redirect('admin/tournaments/manage_tournament/scheduling/' . $tournament_id);
	}

	/*
	 * AJAX
	 */
//	function add_tournament_ajax()
//	{
//		$config['upload_path'] = ' ./uploads / tournaments / ';
//		$config['allowed_types'] = 'gif | jpg | png';
//		$config['max_size'] = 2048;
//		$config['max_width'] = 0;
//		$config['max_height'] = 0;
//		$this->load->library('upload', $config);
//		$this->upload->initialize($config);
//		if (!$this->upload->do_upload('logo')) {
//			$this->session->set_flashdata('exception', 'Please try Again');
//		} else {
//			$logo = $this->upload->data();
//			$tournament = array(
//				'club_id' => $this->input->post('club_name'),
//				'tournament_name' => $this->input->post('tournament_name'),
//				'no_teams' => $this->input->post('no_teams'),
//				'logo' => $logo['file_name'],
//				'status' => $this->input->post('status'),
//				'starting_date' => $this->input->post('starting_date'),
//				'squad_submission_date' => $this->input->post('squad_submission_date'),
//				'created_date' => date('Y - m - d H:i:s')
//			);
//			if ($this->tournament_model->add_tournament($tournament)) {
//				$tournament_id = $this->db->insert_id();
//				$points = array(
//					'tournament_id' => $tournament_id,
//
//					'on_run' => $this->input->post('on_run'),
//					'on_wicket' => $this->input->post('on_wicket'),
//					'on_catch' => $this->input->post('on_catch'),
//					'on_stump' => $this->input->post('on_stump'),
//					'on_six' => $this->input->post('on_six'),
//					'on_win' => $this->input->post('on_win'),
//					'on_loss' => $this->input->post('on_loss'),
//					'on_tie' => $this->input->post('on_tie'),
//					'created_date' => date('Y - m - d H:i:s')
//				);
//				$this->tournament_model->add_tournament_points($points);
//
//				$bonus_points = array(
//					'tournament_id' => $tournament_id,
//					'on_fifty' => $this->input->post('on_fifty'),
//					'on_hundred' => $this->input->post('on_hundred'),
//					'on_oneTwentyfive' => $this->input->post('on_oneTwentyfive'),
//					'on_oneFifty' => $this->input->post('on_oneFifty'),
//					'three_wickets' => $this->input->post('three_wickets'),
//					'four_wickets' => $this->input->post('four_wickets'),
//					'five_wickets' => $this->input->post('five_wickets'),
//					'six_wickets' => $this->input->post('six_wickets'),
//					'created_date' => date('Y - m - d H:i:s')
//				);
//				$this->tournament_model->add_bonus_points($bonus_points);
//
//				$rules = array(
//					'tournament_id' => $tournament_id,
//					'max_over' => $this->input->post('max_over'),
//					'no_ball' => $this->input->post('no_ball'),
//					'wide_ball' => $this->input->post('wide_ball'),
//					'max_balls' => $this->input->post('max_balls'),
//					'free_hit' => $this->input->post('free_hit'),
//					'created_date' => date('Y - m - d H:i:s')
//				);
//				$this->tournament_model->add_rules($rules);
//
//				$term_condition = array(
//					'tournament_id' => $tournament_id,
//					'term_condition' => $this->input->post('summernote'),
//					'created_date' => date('Y - m - d H:i:s')
//				);
//				$this->tournament_model->add_term_condition($term_condition);
//				echo base_url('admin / tournaments');
//			} else {
//				echo 'failed';
//			}
//		}
//	}

	/*Start  Scheduling*/

	/*
	public function scheduling($id)
	{
		$data['title'] = 'Matches Scheduling';
		$data['tournament_id'] = $id;
		if ($this->tournament_model->get_scheduling_by_tournament_id($id) > 0) {
			$data['pools'] = $this->matches_model->get_pools_by_tournament_id($id);
			$data['grounds'] = $this->matches_model->get_grounds_by_tournament_id($id);
			$data['coordinators'] = $this->matches_model->get_all_coordinator();
			$data['scorers'] = $this->matches_model->get_all_scorers();
			$data['umpires'] = $this->matches_model->get_all_umpires();
			$data['matches'] = $this->matches_model->get_all_matches_by_tournament($id);
			$data['time_slots'] = $this->matches_model->get_time_slots_by_tournament($id);

			$data['view'] = $this->load->view('admin/matches/scheduling', $data, true);
			$this->load->view('admin/template', $data);
		} else {
			$data['match_formats'] = $this->tournament_model->get_all_match_format();
			$data['time_slots'] = $this->tournament_model->get_all_slots();
			$data['view'] = $this->load->view('admin/tournaments/scheduling', $data, true);
			$this->load->view('admin/template', $data);
		}
	}*/

	public function add_scheduling()
	{
		if ($this->input->post('submit')) {
			$data = array(
				'msf_id' => $this->input->post('match_format'),
				'tournament_id' => $this->input->post('tournament_id'),
				'created_date' => date('Y-m-d H:i:s')
			);
			if ($this->tournament_model->add_scheduling($data)) {
				foreach ($this->input->post('time_slots') as $value) {
					$data = array(
						'tournament_id' => $this->input->post('tournament_id'),
						'time_slot_id' => $value,
					);
					$response = $this->tournament_model->add_tournament_slots($data);
				}
				if ($response) {
					if ($this->input->post('match_format') == 1) {
						die('manual pooling');
					} else if ($this->input->post('match_format') == 2) {
						$this->auto_scheduling($this->input->post('tournament_id'));
					} else if ($this->input->post('match_format') == 3) {
						$this->cross_pool();
					}

					$this->session->set_flashdata('message', 'Schedule added successfully');
					redirect('admin/tournaments/manage_tournament/' . 'scheduling' . '/' . $this->input->post('tournament_id'));
				}
			} else {
				$this->session->set_flashdata('exception', 'Please try Again');
			}
		}
	}

	public function auto_scheduling($tournament_id)
	{
		$pools = $this->matches_model->get_pools_by_tournament_id($tournament_id);
		$overs = $this->tournament_model->get_tournament_format_by_t_id($tournament_id)->max_over;
		foreach ($pools as $pool) {
			$result = $this->matches_model->get_pools_teams($pool->id);
			for ($i = 0; $i < count($result); $i++) {
				for ($j = $i + 1; $j < count($result); $j++) {
					$data = array(
						'tournament_id' => $tournament_id,
						'first_team_id' => $result[$i]->team_id,
						'second_team_id' => $result[$j]->team_id,
						'status' => 0,
						'match_overs' => $overs,
						'match_time' => 0,
						'created_date' => date('Y-m-d H:i:s')
					);
					$this->matches_model->add_match($data);
				}
			}
		}
	}

	public function cross_pool()
	{
		$pools = $this->matches_model->get_pools_by_tournament_id($this->input->post('tournament_id'));
		$overs = $this->tournament_model->get_tournament_format_by_t_id($this->input->post('tournament_id'))->max_over;
		for ($i = 0; $i < count($pools); $i++) {
			$first_team = $this->matches_model->get_pools_teams($pools[$i]->id);
			if ($pools[$i + 1]->id) {
				$second_team = $this->matches_model->get_pools_teams($pools[$i + 1]->id);
				if ($second_team) {
					for ($j = 0; $j < count($first_team); $j++) {
						for ($k = 0; $k < count($second_team); $k++) {
							$data = array(
								'tournament_id' => $this->input->post('tournament_id'),
								'first_team_id' => $first_team[$j]->team_id,
								'second_team_id' => $second_team[$k]->team_id,
								'status' => 0,
								'match_overs' => $overs,
								'match_time' => 0,
								'created_date' => date('Y-m-d H:i:s')
							);
							$this->matches_model->add_match($data);
						}
					}
				}
			}
		}
	}

	/*End  Scheduling*/
	public function send_team_invitation()
	{
		$emails = json_decode($this->input->post('email'), true);
		$tournament_id = $this->input->post('tournament_id');
		$tournament = $this->tournament_model->get_tournament_by_id($tournament_id);
		$template = $this->db->select('*')->from('email_templates')->where('template_name', 'invite_team')->get()->row();

		foreach ($emails as $email) {

			$team = $this->team_model->get_team_by_email($email);
			$team_invitation = $this->team_model->get_team_invitation($tournament_id, $team->id);
			if (!($team_invitation->num_rows() > 0)) { //insert invitation if not exist
				$invitation = array(
					'tournament_id' => $tournament_id,
					'team_id' => $team->id,
					'status' => 0,
					'created_date' => date('Y-m-d H:i:s'),
					'updated_date' => date('Y-m-d H:i:s')
				);
				$invitation_id = $this->team_model->insert_invitation($invitation);
			} else {
				$invitation_id = $team_invitation->row()->id;
			}


			preg_match_all('/{(\w+)}/', $template->template_value, $matches);
			$team_name_replace = str_replace($matches[0][0], ucfirst(strtolower($team->company_name)), $template->template_value);
			$invite_link_html = '<a style="padding: 8px 12px; border: 1px solid #5867dd;background-color: #5867dd;border-radius: 2px;font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;text-decoration: none;font-weight:bold;display: inline-block;" href="' . base_url('invitation/invitation/') . $invitation_id . ' ">Accept Invitation</a>';
			$rules_link_html = '<a class="btn btn-primary btn-sm" href="' . base_url('uploads/tournaments_files/') . $tournament->rules . '">Tournament Rules</a>';
			$cc_link_html = '<a class="btn btn-primary btn-sm" href="' . base_url('uploads/tournaments_files/') . $tournament->code_conduct . '">Tournament Code of Conduct</a>';
			$invitation_link_html = '<a class="btn btn-primary btn-sm" href="' . base_url('uploads/tournaments_files/') . $tournament->invitation . '">Tournament Invitation</a>';

			$tournament_name_replace = str_replace($matches[0][1], $tournament->tournament_name, $team_name_replace);

			$invite_link_replace = str_replace($matches[0][2], $invite_link_html, $tournament_name_replace);

			$rules_cc = str_replace($matches[0][3], $rules_link_html, $invite_link_replace);

			$cc_change = str_replace($matches[0][4], $cc_link_html, $rules_cc);

			$invitation_change = str_replace($matches[0][5], $invitation_link_html, $cc_change);

			send_tournament_email($template->subject, $email, $team->email_2, $team->email_3, $invitation_change);

			//Notification
			$n = $this->notification_model->checkInviteNotificationByTeamID($team->id, $tournament->id);
			if ($n == null) {
				$notification = array(
					'team_id' => $team->id,
					'tournament_id' => $tournament->id,
					'type' => "tournament_invitation",
					'title' => "Tournament Invitation",
					'message' => "CPL has invited you to " . $tournament->tournament_name,
					'image' => base_url('uploads/tournaments/' . $tournament->logo),
					'status' => 0,
					'created_date' => date('Y-m-d H:i:s')
				);

				$this->notification_model->insertNotification($notification);
			}

			if ($team->fcm !== null) {
				$push = new Push();
				$firebase = new Firebase();

				$push->setNotification("Tournament Invitation", "CPL has invited you to " . $tournament->tournament_name);
				$push->setData(array(
					'tournament_id' => $tournament->id,
					'image' => $tournament->logo
				));
				$firebase_key = $this->setting_model->get_firebase_key()->value;
				$notification = $push->getNotification();
				$data = $push->getData();
				$firebase->send($team->fcm, $notification, $data, $firebase_key);
			}
		}

		echo "success";
	}


	public function send_pooling_invitation()
	{
		$emails = json_decode($this->input->post('email'), true);
		$tournament_id = $this->input->post('tournament_id');
		$template = $this->db->select('template_value')->from('email_templates')->where('template_name', 'invite_team')->get()->row()->template_value;
		$this->load->library('phpmailer_library');
		$mail = $this->phpmailer_library->load();
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'leofurqan27@gmail.com';
		$mail->Password = 'xlmkgefevviufnqz';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->setFrom('leofurqan27@gmail.com', 'Leo Furqan');

		// Email subject
		$mail->Subject = 'Tournament Pooling Invitation';

		// Set email format to HTML
		$mail->isHTML(true);


		// Add a recipient
		foreach ($emails as $email) {
			$team = $this->team_model->get_team_by_email($email);
			$pooling_invitation = $this->team_model->get_pooling_invitation($tournament_id, $team->id);

			if (!($pooling_invitation->num_rows() > 0)) { //insert invitation if not exist
				$pooling_invitation = array(
					'tournament_id' => $tournament_id,
					'team_id' => $team->id,
					'status' => 0,
					'created_date' => date('Y-m-d H:i:s'),
					'updated_date' => date('Y-m-d H:i:s')
				);
				$invitation_id = $this->team_model->insert_pooling_invitation($pooling_invitation);
			} else {
				$invitation_id = $pooling_invitation->row()->id;
			}

			$mail->addAddress($email);
			$mail->Body = $template . ' < br>' . base_url('admin/invitation/pooling_invitation / ') . $invitation_id;
		}

		// Send email
		if ($mail->send()) {
			$this->session->set_flashdata('message', 'Invitation sent successfully');
			echo "success";
		} else {
			echo $mail->ErrorInfo;
		}
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1) {
			$data = array('status' => 0);
			$result = $this->tournament_model->update_tournament($data, $id);
			echo json_encode($result);
		} else {
			$data = array('status' => 1);
			$result = $this->tournament_model->update_tournament($data, $id);
			echo json_encode($result);
		}
	}

	public function confirm_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$data = array('status' => $status);
		$result = $this->tournament_model->update_status($data, $id);
		echo json_encode($result);

	}

	public function get_points_data()
	{
		$id = $this->input->post('tournament_id');
		$pools = $this->tournament_model->get_current_tournament_pools($id);
		$teams = $this->tournament_model->get_all_teams_by_pool($id);
		$points = $this->tournament_model->get_table_point($id);
		$html = '';
		if (count($pools) == 2) {
			$col = "col-lg-6";
		} else if (count($pools) == 3) {
			$col = "col-lg-4";
		} else {
			$col = "col-lg-3";
		}
		foreach ($pools as $pool) {
			$html .= '<div class=' . $col . '>' .
				'<span class="font-weight-bold">Pool: ' . $pool->pools_name . '</span>'
				. '<table class="table table-striped table-bordered table-hover table-checkable"  id="table_tournaments">'
				. '<thead>'
				. '<tr>'
				. '<th>Teams</th>'
				. '<th>P</th>'
				. '<th>W</th>'
				. '<th>L</th>'
				. '<th>T</th>'
				. '<th>Pts</th>'
				. '<th>NRR</th>'
				. '</tr>'
				. '</thead>'
				. '<tbody>';
			foreach ($teams as $key => $team) {
				$net_run_rate = $this->tournament_model->get_nrr($team->id, $id);
				if ($pool->id == $team->pool_id) {
					foreach ($points as $point) {
						if ($point->team == $team->id) {
							if ($point->num_wins != '0' && $point->num_ties != '0') {
								$point_cal = $point->num_wins * 2;
								$point_cal += $point->num_ties * 1;
							} else if ($point->num_wins == '0' && $point->num_ties != '0') {
								$point_cal = $point->num_ties * 1;
							} else if ($point->num_wins != '0' && $point->num_ties == '0') {
								$point_cal = $point->num_wins * 2;
							} else {
								$point_cal = '0';
							}
							$html .= '<tr>'
								. '<td>' . substr($team->company_name, 0, 18) . '</td>'
								. '<td>' . $point->num_total . '</td>'
								. '<td>' . $point->num_wins . '</td>'
								. '<td>' . $point->num_losses . '</td>'
								. '<td>' . $point->num_ties . '</td>'
								. '<td>' . $point_cal . '</td>';
							if ($net_run_rate->nrr != null) {
								$html .= '<td>' . $net_run_rate->nrr . '</td>';
							} else {
								$html .= '<td>0</td>';
							}
							$html .= '</tr>';
						}
					}
				}
			}

			$html .= '</tbody>' .
				'</table>'
				. '</div>';
		}
		echo json_encode($html);
	}

	public function calculate_nrr()
	{
		$result = $this->tournament_model->get_nrr();
		$nrr = array();
		if ($result) {
			for ($i = 0; $i < count($result); $i++) {
				if (isset($result[$i + 1])) {
					if ($result[$i]->match_result_match_id == $result[$i + 1]->match_result_match_id) {
						if ($result[$i]->total_wickets == 10) {
							$first_team = $result[$i]->total_score / 20;
						} else {
							$first_team = $result[$i]->total_score / $result[$i]->over_count;
						}
						if ($result[$i + 1]->total_wickets == 10) {
							$second_team = $result[$i + 1]->total_score / 20;
						} else {
							$second_team = $result[$i + 1]->total_score / $result[$i + 1]->over_count;
						}
						$first_team_nrr = $first_team - $second_team;
						$second_team_nrr = $second_team - $first_team;

						array_push($nrr, array("team_id" => $result[$i]->team_id, "nrr" => $first_team_nrr), array("team_id" => $result[$i + 1]->team_id, "nrr" => $second_team_nrr));
					}
				}
			}
			return $nrr;
		} else {
			return false;
		}
	}

	public function confirm_teams()
	{
		$ids = json_decode($this->input->post('id'), true);
		foreach ($ids as $id) {
			$data = array(
				'status' => 2
			);
			$this->tournament_model->update_status($data, $id);
		}
		echo "success";
	}
}
