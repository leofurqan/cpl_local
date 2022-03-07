<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grounds extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/ground_model',
			'admin/tournament_model'
		));
	}

	public function index()
	{
		$data['title'] = 'Ground List';
		$data['grounds'] = $this->ground_model->get_all_grounds();
		$data['view'] = $this->load->view('admin/grounds/list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function reserve_list()
	{
		$data['title'] = 'Reserved Ground List';
		$data['tournaments'] = $this->tournament_model->get_all_tournaments();
		$data['grounds'] = $this->ground_model->get_all_grounds();
		$data['reserve_grounds'] = $this->ground_model->get_all_reserve_grounds();
		$data['view'] = $this->load->view('admin/grounds/reserve_list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function add_ground()
	{
		$data['title'] = 'Add Ground';
		if ($this->input->post('submit') === "submit") {
			$config['upload_path'] = './uploads/grounds/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->session->set_flashdata('exception', 'Please Try Again');
			} else {
				$image = $this->upload->data();

				$ground = array(

					'ground_name' => $this->input->post('ground_name'),
					'email' => $this->input->post('email'),
					'ground_manager' => $this->input->post('ground_manager'),
					'contact' => $this->input->post('contact'),
					'address' => $this->input->post('address'),
					'image' => $image['file_name'],
					'longitude' => $this->input->post('longitude'),
					'latitude' => $this->input->post('latitude'),
					'status' => $this->input->post('status'),
					'created_date' => date('Y-m-d H:i:s')
				);
				if ($this->ground_model->add_ground($ground)) {
					$this->session->set_flashdata('message', 'Added Successfully');
					redirect('admin/grounds/');

				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}

		}
		$data['view'] = $this->load->view('admin/grounds/add_ground', $data, true);
		$this->load->view('admin/template', $data);

	}

	public function edit($id)
	{
		$data['title'] = 'Edit Ground';
		$data['ground'] = $this->ground_model->get_ground_by_id($id);
		if ($this->input->post('submit') === "submit") {


			$config['upload_path'] = './uploads/grounds/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$image = $data['ground']->image;
			} else {
				$img_name = $data['ground']->image;
				unlink('./uploads/grounds/' . $img_name);

				$image = $this->upload->data()["file_name"];
			}
			$ground = array(
				'ground_name' => $this->input->post('ground_name'),
				'email' => $this->input->post('email'),
				'ground_manager' => $this->input->post('ground_manager'),
				'contact' => $this->input->post('contact'),
				'address' => $this->input->post('address'),
				'image' => $image,
				'longitude' => $this->input->post('longitude'),
				'latitude' => $this->input->post('latitude'),
				'status' => $this->input->post('status'),
				'created_date' => date('Y-m-d H:i:s')
			);


			if ($this->ground_model->update_ground($ground, $id)) {
				$this->session->set_flashdata('message', 'Updated Successfully');
				redirect('admin/grounds/');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}

		$data['view'] = $this->load->view('admin/grounds/edit', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function delete($id)
	{
		if ($this->ground_model->delete_ground($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		$this->index();
	}

	public function change_password($id)
	{
		$data['title'] = 'Change Password';
		if ($this->input->post('submit') === 'submit') {

			$new_password = array('password' => sha1($this->input->post('new_password')));
			if ($this->ground_model->change_password($new_password, $id)) {
				$this->session->set_flashdata('message', 'Password Changed Successfully');
			} else {
				$this->session->set_flashdata('exception', 'Something went wrong');
			}
		}
		$this->index();
//		$data['view'] = $this->load->view('admin/teams/change_password', $data, true);
//		$this->load->view('admin/template', $data);
	}


	public function reserve_ground()
	{
		$tournament_id = $this->input->post('tournament_id');
		$ground_id = $this->input->post('ground_id');
		$reserve_date = explode(",", $this->input->post('reserve_date'));

		for ($i = 0; $i < sizeof($reserve_date); $i++) {
			$date = date('Y-m-d', strtotime($reserve_date[$i]));
			$reserve_ground = $this->ground_model->check_ground_reservation($tournament_id, $ground_id, $date);
			if (!($reserve_ground->num_rows() > 0)) {
				$grounds = array(
					'tournament_id' => $tournament_id,
					'ground_id' => $ground_id,
					'reserve_date' => $date,
					'created_date' => date('Y-m-d H:i:s')
				);

				if ($this->ground_model->reserve_ground($grounds)) {
					$this->session->set_flashdata('message', 'Added Successfully');
				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}
		}

		echo json_encode("submitted");
	}


	/*AJAX Functions */
	function check_email()
	{
		$email = $this->input->post('email');
		$result = $this->ground_model->check_email($email);
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
		$result = $this->ground_model->check_contact($contact);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		if ($status == 1) {
			$data = array('status' => 0);
			$result = $this->ground_model->update_ground($data, $id);
			echo json_encode($result);
		} else {
			$data = array('status' => 1);
			$result = $this->ground_model->update_ground($data, $id);
			echo json_encode($result);
		}
	}

	public function filter_reserve_ground_by_tournament()
	{
		$tournament_id = $this->input->post('tournament_id');
		$grounds = $this->ground_model->get_reserve_grounds_by_tournament_id($tournament_id);
		$response = '';
		foreach ($grounds as $ground) {
			$response .= '<tr>
							<td>' . $ground->reserve_date .'</td>
							<td>' . $ground->ground_name . '</td>
						</tr>';
		}

		echo $response;
	}
}
