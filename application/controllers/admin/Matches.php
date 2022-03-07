<?php


class Matches extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/matches_model'
		));
	}

	public function update_match()
	{
		$date = strtotime($this->input->post('match_date'));
		$date = date('Y-m-d',$date);
		$id = $this->input->post('match_id');
		$data =array(
			'ground_id'=>$this->input->post('ground_name'),
			'scorer_id'=>$this->input->post('scorer_name'),
			'coordinator_id'=>$this->input->post('coordinator_name'),
			'first_umpire_id'=>$this->input->post('first_umpire'),
			'second_umpire_id'=>$this->input->post('second_umpire'),
			'third_umpire_id '=>$this->input->post('third_umpire'),
			'match_time'=>$this->input->post('time_slot'),
			'commentator_id'=>$this->input->post('commentator_id'),
			'match_date'=>$date,
			);
		if ($this->matches_model->update_match($id,$data)){
			$this->session->set_flashdata('message', 'Schedule added successfully');
			redirect('admin/tournaments/manage_tournament/scheduling/'.$this->input->post('tournament_id'));
		}
		else{
			$this->session->set_flashdata('exception', 'Please try Again');
		}

	}

/*Ajax Function*/

	public function get_teams_by_id()
	{
		$id = $this->input->post('id');
		$result = $this->matches_model->get_teams_by_id($id);
		echo json_encode($result);

	}

	public function get_second_umpire()
	{
		$id = $this->input->post('id');
		$result = $this->matches_model->get_second_umpire($id);
		echo json_encode($result);
	}
	public function get_third_umpire()
	{
		$id = $this->input->post('id');
		$second_id = $this->input->post('second_id');
		$result = $this->matches_model->get_third_umpire($id,$second_id);
		echo json_encode($result);
	}

	public function get_matches_by_date()
	{
		$date = strtotime($this->input->post('date'));
		$time = $this->input->post('time');
		$ground = $this->input->post('ground');
		$date=date('d',$date);
		$result = $this->matches_model->get_matches_by_date($date,$time,$ground);
		echo json_encode($result);
	}
	public function get_grounds_by_reserve_date()
	{
		$date = date('Y-m-d',strtotime($this->input->post('reserve_date')));
		$id=$this->input->post('tournament_id');
		$result = $this->matches_model->get_grounds_by_reserve_date($id,$date);
		echo json_encode($result);
	}
}
