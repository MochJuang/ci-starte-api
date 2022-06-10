<?php 


function dd($value)
{
	echo '<pre>';
	print_r($value);
	echo '</pre>';
}

function isLogin()
{
	$ci =& get_instance();
	if (!$ci->session->has_userdata('token-psikotest')) {
		redirect('user','refresh');
	}
}