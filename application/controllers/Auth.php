<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}
	
	public function login()
	{
		$auth = $this->auth_model;
		$validation = $this->form_validation;
		$validation->set_rules($auth->login_rules());

		$data = [
			'project'=>'Simple CRUD with Codeigniter 3.1.11',
			'title'=>'Login'
		];

		if ($validation->run() == FALSE) {			
			$this->load->view('sections/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('sections/footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$data = [
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password')
		];
		$user = $this->auth_model->getUser($data['email']);

		// var_dump($user);
		// die;

		if ($user) {
			if (password_verify($data['password'], $user['password'])) {
				$data = [
					'email'=>$user['email'],
					'username'=>$user['username']
				];

				$this->session->set_userdata($data);
				redirect('crud');
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">
						Wrong password bro, try again!
					</div>'
				);
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">
					Email isn`t registered, please 
					<a href="'.site_url('auth/register').'">Register here</a>
				</div>'
			);
			redirect('auth/login');
		}
	}
	
	public function register()
	{
		$auth = $this->auth_model;
		$validation = $this->form_validation;
		$validation->set_rules($auth->reg_rules());
		$sessions = $this->session;

		$data = [
			'project'=>'Simple CRUD with Codeigniter 3.1.11',
			'title'=>'Register'
		];

		if ($validation->run() == FALSE) {			
			$this->load->view('sections/header', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('sections/footer');
		} else {
			$input = [
				# add true in post param to avoid XSS attack
				# add htmlspecialchars() for change character to HTML entity
				'email'=>htmlspecialchars($this->input->post('email', true)),
				'username'=>htmlspecialchars($this->input->post('username', true)),
				'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'active'=>1
			];

			// var_dump($input);
			// die;

			$auth->create($input);
			$sessions->set_flashdata(
				'message',
				'<div class="alert alert-success" role="alert">
				Your account has been registered, Please Login.
				</div>'
			);
			redirect('auth/login', 'refresh');
		}
	}
}