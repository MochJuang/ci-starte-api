<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


	public function index()
	{
		if ($this->session->has_userdata('token-gudang')) {
			redirect('auth/main','refresh');
		}else{
			redirect('auth/login','refresh');
		}
	}

	public function login()
	{
		// dd($_POST);die;
		if (!isset($_POST)) {
			$this->load->view('contents/auth/login');
			die;
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('contents/auth/login');
		} else {
			$result = $this->user->login($this->input->post());
			// dd($result);
			if ($result->status != 200) {
				echo json_encode(['status' => false, 'message' => $result->message]);
			}else{
				$this->session->set_userdata('token-gudang', $result->data->token);
				if (isset($_POST['remember-me'])) {
					set_cookie('token', $result->data->token);
				}
				echo json_encode(['status' => true]);
			}
		}
	}

	public function main()
	{
		$data['title'] = 'Dashboard';
		$data['breadcrumb'] = 	['Dashboard', 'Data'];
		$this->template->load('contents/dashboard/index',$data);
	}
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */