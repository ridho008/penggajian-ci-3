<?php

function cekSession()
{
	$ci = get_instance();
	if(!$ci->session->userdata('role') == 1) {
		redirect('auth');
	} else if(!$ci->session->userdata('level') == 2) {
		redirect('auth');
	}
}

function cekMenu()
{
	$ci = get_instance();
	if($ci->session->userdata('level') == 'user') {
		redirect('user/dashboard');
	}
}
