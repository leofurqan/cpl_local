<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}
		$this->load->model(array(
			'admin/login_model'
		));

	}

	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->login_model->get_user_by_id();
		$data['view'] = $this->load->view('admin/profile', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function edit_information()
	{
		$data['title'] = 'My Profile';
		if ($this->input->post('submit') === 'submit') {

				$config['upload_path'] = './uploads/user/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;
				$config['max_width'] = 0;
				$config['max_height'] = 0;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image')) {
					$image = $data['user']->image;
				}

				else {
					$img_name = $data['user']->image;
					unlink('./uploads/user/'.$img_name);
					$image = $this->upload->data()["file_name"];
				}
			$profile = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'contact' => $this->input->post('contact'),
				'password' => $this->input->post('password'),
				'image' => $image,
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'updated_date' => date('Y-m-d H:i:s')
			);



			if ($this->login_model->update_profile($profile)) {
				$this->session->set_flashdata('message', 'Updated Successfully');
				redirect('admin/admin');
			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}
		}
		$data['view'] = $this->load->view('admin/profile', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function change_password()
	{
		$data['title'] = 'Change Password';
		if ($this->input->post('submit') === 'submit') {
			$current_password = $this->input->post('current_password');
			$check_password = $this->login_model->check_password($current_password);
			if ($check_password !== null) {
				$new_password = array('password' => sha1($this->input->post('new_password')));
				if ($this->login_model->change_password($new_password)) {
					$this->session->set_flashdata('message', 'Password Changed Successfully');
				} else {
					$this->session->set_flashdata('exception', 'Something went wrong');
				}
			} else {
				$this->session->set_flashdata('exception', 'Current Password is incorrect');
			}
		}
		$data["user"] = $this->login_model->get_user_by_id();
		$data['view'] = $this->load->view('admin/change_password', $data, true);
		$this->load->view('admin/template', $data);
	}

}
