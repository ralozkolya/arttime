<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->language('admin', GE);
		$this->load->model('User');
		$this->load->library(['Auth', 'session']);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			redirect(base_url('login'));
		}
	}

	public function index() {
		$this->pages();
	}

	public function pages() {

		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/pages', $this->data);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */