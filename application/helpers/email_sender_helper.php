<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function send_message($d) {

	$ci =& get_instance();

	$data['email'] = htmlspecialchars($d['email']);
	$data['name'] = htmlspecialchars($d['name']);
	$data['subject'] = htmlspecialchars($d['subject']);
	$data['message'] = $ci->load->view('emails/message', $d, TRUE);
	$data['reply_to'] = htmlspecialchars($d['email']);

	send_email($data);
}

function send_email($data) {

	$ci =& get_instance();

	$ci->load->library('email');

	$ci->email->from($data["email"], $data['name']);
	$ci->email->to(INFO_MAIL);

	if(!empty($data['reply_to'])) {
		$ci->email->reply_to($data['reply_to'], $data['name']);
	}

	$ci->email->subject($data['subject']);
	$ci->email->message($data['message']);

	$ci->email->send();
}

/* End of file email_sender_helper.php */
/* Location: ./application/helpers/email_sender_helper.php */