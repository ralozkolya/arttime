<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['send_message'] = array(

	array(
		'field' => 'name',
		'label' => 'lang:name',
		'rules' => 'required|trim',
	),

	array(
		'field' => 'email',
		'label' => 'lang:email',
		'rules' => 'required|trim|valid_email',
	),

	array(
		'field' => 'message',
		'label' => 'lang:message',
		'rules' => 'required|trim',
	),
);

$config['edit_Page'] = array(
	array(
		'field' => 'id',
		'label' => 'lang:id',
		'rules' => 'required|is_natural',
	),
	array(
		'field' => 'ka_title',
		'label' => 'lang:ka_title',
		'rules' => 'required|trim',
	),
	array(
		'field' => 'en_title',
		'label' => 'lang:en_title',
		'rules' => 'required|trim',
	),
	array(
		'field' => 'priority',
		'label' => 'lang:priority',
		'rules' => 'required|is_natural',
	),
);

$config['change_password'] = array(

	array(
		'field' => 'password',
		'label' => 'lang:password',
		'rules' => 'required|min_length[6]',
	),

	array(
		'field' => 'repeat_password',
		'label' => 'lang:repeat_password',
		'rules' => 'required|matches[password]',
	),
);

$config['add_Banner'] = array(

	array(
		'field' => 'priority',
		'label' => 'lang:priority',
		'rules' => 'numeric',
	),
);

$config['edit_Banner'] = array(

	array(
		'field' => 'id',
		'label' => 'lang:id',
		'rules' => 'required|numeric',
	),

	array(
		'field' => 'priority',
		'label' => 'lang:priority',
		'rules' => 'numeric',
	),
);

$config['add_Brand'] = array(

	array(
		'field' => 'en_name',
		'label' => 'lang:en_name',
		'rules' => 'required',
	),

	array(
		'field' => 'ka_name',
		'label' => 'lang:ka_name',
		'rules' => 'required',
	),

	array(
		'field' => 'priority',
		'label' => 'lang:priority',
		'rules' => 'numeric',
	),
);

$config['edit_Brand'] = array(

	array(
		'field' => 'id',
		'label' => 'lang:id',
		'rules' => 'required|is_natural',
	),

	array(
		'field' => 'en_name',
		'label' => 'lang:en_name',
		'rules' => 'required',
	),

	array(
		'field' => 'ka_name',
		'label' => 'lang:ka_name',
		'rules' => 'required',
	),

	array(
		'field' => 'priority',
		'label' => 'lang:priority',
		'rules' => 'numeric',
	),
);