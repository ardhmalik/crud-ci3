<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model', 'cmodel');
	}
	
	public function index()
	{
		$data = [
			'project'=>'Simple CRUD with Codeigniter 3.1.11',
			'title'=>'Home',
			'siswa'=>$this->cmodel->getData()
		];

		$this->load->view('sections/header', $data);
		$this->load->view('sections/navbar', $data);
		$this->load->view('sections/main', $data);
		$this->load->view('sections/footer');
	}
	
	public function add()
	{
		$data = [
			'project'=>'Simple CRUD with Codeigniter 3.1.11',
			'title'=>'Add New Data'
		];

		if ($this->input->post()) {
			$statusCheck = $this->input->post('status');
			
			if ($statusCheck == NULL) {
				$status = 0;
			} elseif ($statusCheck == 'on') {
				$status = 1;
			}
			
			$input = [
				'nama'=>$this->input->post('nama'),
				'jenis_kel'=>$this->input->post('gender'),
				'alamat'=>$this->input->post('alamat'),
				'kelas'=>$this->input->post('kelas'),
				'telp'=>$this->input->post('telp'),
				'status'=>$status
			];

			// var_dump($input);
			// die;

			$inProcess = $this->cmodel->add($input);

			if ($inProcess) {
				redirect('crud');
			} else {
				redirect('crud/add');
			}
		}
		
		$this->load->view('sections/header', $data);
		$this->load->view('sections/navbar', $data);
		$this->load->view('content/form_add', $data);
		$this->load->view('sections/footer');
	}

	public function edit($id)
	{
		$data = [
			'project'=>'Simple CRUD with Codeigniter 3.1.11',
			'title'=>'Edit Data',
			'siswa'=>$this->cmodel->getDataId($id)
		];

		if ($this->input->post()) {
			$statusCheck = $this->input->post('status');
			
			if ($statusCheck == NULL) {
				$status = 0;
			} elseif ($statusCheck == 'on') {
				$status = 1;
			}
			
			$input = [
				'nama'=>$this->input->post('nama'),
				'jenis_kel'=>$this->input->post('gender'),
				'alamat'=>$this->input->post('alamat'),
				'kelas'=>$this->input->post('kelas'),
				'telp'=>$this->input->post('telp'),
				'status'=>$status
			];

			// var_dump($input);
			// die;

			$inProcess = $this->cmodel->update($id, $input);

			if ($inProcess) {
				redirect('crud');
			} else {
				redirect('crud/edit/' . $id);
			}
		}
		
		$this->load->view('sections/header', $data);
		$this->load->view('sections/navbar', $data);
		$this->load->view('content/form_edit', $data);
		$this->load->view('sections/footer');
	}

	public function delete($id)
	{
		$this->cmodel->delete($id);
		redirect('crud');
	}
}