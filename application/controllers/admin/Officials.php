<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Officials extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!is_admin_logged_in()) {
			redirect('admin/login');
		}

		$this->load->model(array(
			'admin/official_model'
		));
	}

	public function index()
	{

		$data['title'] = 'Official List';
		$data['officials'] = $this->official_model->get_all_officials();
		$data['view'] = $this->load->view('admin/officials/list', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function add_official()
	{
		$data['title'] = 'Add Official';
		if($this->input->post('submit') === "submit") {
			if ($this->input->post('image') !== null) {
				$config['upload_path'] = './uploads/officials/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = 2048;
				$config['max_width'] = 0;
				$config['max_height'] = 0;
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('image')) {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}

				$image = $this->upload->data();
				$password = generate_string();

				$official = array(
					'type_id' => $this->input->post('official_type'),
					'full_name' => $this->input->post('official_name'),
					'email' => $this->input->post('email'),
					'password' => sha1($password),
					'contact' => $this->input->post('contact'),
					'address' => $this->input->post('address'),
					'image' => $image['file_name'],
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),
					'updated_date' => date('Y-m-d H:i:s')
				);


				if ($this->official_model->add_official($official)) {

					$email = $this->input->post('email');
					$this->load->library('phpmailer_library');
					$mail = $this->phpmailer_library->load();
					$mail->isSMTP();
					$mail->Host = 's26.hosterpk.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'marketing@cpl.net.pk';
					$mail->Password = 'lahore@786';
					$mail->SMTPSecure = 'ssl';
					$mail->Port = 465;
					$mail->setFrom('marketing@cpl.net.pk', 'CPS Club');

					// Email subject
					$mail->Subject = 'Login Credentials';

					// Set email format to HTML
					$mail->isHTML(true);

					// Add a recipient
					$mail->addAddress($email);
					$mail->Body ='Dear'.$this->input->post('official_name').' ,<br> Your Portal login credentials are under as <br>'. 'Username: ' . $email . '<br>Password: ' . $password;

					// Send email
					$mail->send();
					redirect('admin/officials/');

				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}
		}
		$data['official_type'] = $this->official_model->get_all_official_types();
		$data['view'] = $this->load->view('admin/officials/add_official', $data, true);
		$this->load->view('admin/template', $data);
	}


	public function official_type()
	{
		$data['title'] = 'Official Type';
		if($this->input->post('submit') == "submit") {
			$official_type = array(

				'type_name' => $this->input->post('type_name'),
				'created_date' => date('Y-m-d H:i:s')
			);
			if ($this->official_model->official_type($official_type)) {
				$this->session->set_flashdata('message', 'Added Successfully');
				redirect('admin/officials/');

			} else {
				$this->session->set_flashdata('exception', 'Please Try Again');
			}


		}
		$data['view'] = $this->load->view('admin/officials/official_type', $data, true);
		$this->load->view('admin/template', $data);
	}
	public function edit($id)
	{
		$data['title'] = 'Edit Official';
		$data['official_type'] = $this->official_model->get_all_official_types();
		$data['official'] = $this->official_model->get_official_by_id($id);
		if ($this->input->post('submit') == 'submit') {


			$config['upload_path'] = './uploads/officials/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['max_width'] = 0;
			$config['max_height'] = 0;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$image = $data['official']->image;
			}

			else {
				$img_name = $data['official']->image;
				unlink('./uploads/officials/'.$img_name);

				$image = $this->upload->data()["file_name"];
			}

				$official = array(
					'type_id' => $this->input->post('official_type'),
					'full_name' => $this->input->post('official_name'),
					'email' => $this->input->post('email'),

					'contact' => $this->input->post('contact'),
					'address' => $this->input->post('address'),
					'image' => $image,
					'description' => $this->input->post('description'),
					'status' => $this->input->post('status'),
					'created_date' => date('Y-m-d H:i:s')
				);


				if ($this->official_model->update_official($official, $id)) {
					$this->session->set_flashdata('message', 'Updated Successfully');
					redirect('admin/officials/');

				} else {
					$this->session->set_flashdata('exception', 'Please Try Again');
				}
			}


		$data['view'] = $this->load->view('admin/officials/edit', $data, true);
		$this->load->view('admin/template', $data);
	}

	public function delete($id)
	{
		if ($this->official_model->delete_official($id)) {
			$this->session->set_flashdata('message', 'Deleted Successfully');
		} else {
			$this->session->set_flashdata('exception', 'Please Try Again');
		}
		$this->index();
	}

	public function change_password()
	{
		$data['title'] = 'Change Password';
		if ($this->input->post('submit') === 'submit') {
			$id=$this->input->post('official_id');

			$new_password = array('password' => sha1($this->input->post('new_password')));
			if ($this->official_model->change_password($new_password,$id)) {
				$this->session->set_flashdata('message', 'Password Changed Successfully');
			} else {
				$this->session->set_flashdata('exception', 'Something went wrong');
			}
		}
		$this->index();

	}


	/*AJAX Functions */
	function check_email()
	{
		$email = $this->input->post('email');
		$result = $this->official_model->check_email($email);
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
		$result = $this->official_model->check_contact($contact);
		if (sizeof($result) > 0) {
			$response = false;
		} else {
			$response = true;
		}

		echo json_encode($response);
	}

	public function change_status()
	{
		$id =$this->input->post('id');
		$status= $this->input->post('status');
		if ($status==1){
			$data = array('status'=>0);
			$result = $this->official_model->update_official($data,$id);
			echo json_encode($result);
		}
		else{
			$data = array('status'=>1);
			$result = $this->official_model->update_official($data,$id);
			echo json_encode($result);
		}



	}
	public function send_official_credentials($id)
	{
		$email = $this->official_model->get_official_by_id($id)->email;
		$password = generate_string();
		$data['title'] = 'official Credentials';
		$official_password = array('password' => sha1($password));
		if ($this->official_model->update_official($official_password, $id)) {
			$this->load->library('phpmailer_library');
			$mail = $this->phpmailer_library->load();
			$mail->isSMTP();
			$mail->Host = 's26.hosterpk.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'marketing@cpl.net.pk';
			$mail->Password = 'lahore@786';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;
			$mail->setFrom('marketing@cpl.net.pk', 'CPS Club');

			// Email subject
			$mail->Subject = 'Email Credentials';

			// Set email format to HTML
			$mail->isHTML(true);

			// Add a recipient
			$mail->addAddress($email);
			$mail->Body = 'Username: ' . $email . '<br>' . 'Password: ' . $password;

			// Send email
			if (!$mail->send()) {
				$this->session->set_flashdata('exception', 'Something went wrong...');
			} else {
				$this->session->set_flashdata('message', 'Login Credentials sent successfully');
			}
		} else {
			$this->session->set_flashdata('exception', 'Something went wrong...');
		}

		redirect('admin/officials');
	}

}
