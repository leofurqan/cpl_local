<?php defined('BASEPATH') or exit('No direct script access allowed');

class Excel_data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel/excel_model');
		$this->load->library('excel');
	}

	public function index()
	{
		$this->load->view('excel_data');
	}

	public function import()
	{
		if(isset($_POST["import"]))
		{
			$filename=$_FILES["file"]["tmp_name"];
			if($_FILES["file"]["size"] > 0)
			{
				$file = fopen($filename, "r");
				while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
				{
					$data = array(
						'company_name' => $importdata[2],
						'contact' => $importdata[4],
						'email' => $importdata[5],
						'created_date' => date('Y-m-d'),
					);
					$insert = $this->excel_model->insert_data($data);
				}
				fclose($file);
				$this->session->set_flashdata('message', 'Data are imported successfully..');

			}else{
				$this->session->set_flashdata('message', 'Something went wrong..');

			}
		}

	}

}
