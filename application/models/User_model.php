<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function login($value)
	{
		$data = getservice('POST', 'admin/login', '', [
			'multipart' => [
				[
	                'name' => 'username',
	                'contents' => $this->input->post('username'),
	            ],
	            [
	                'name' => 'password',
	                'contents' => $this->input->post('password'),
	            ]
	        ]
		]);

		return $data;
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */