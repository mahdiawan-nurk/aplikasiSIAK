<?php
function cek_aktif()
{
	$ci=get_instance();
	if ($ci->session->userdata('login') == false && $ci->session->userdata('id_users') == "") {
		return	redirect('secure');
		} 
}