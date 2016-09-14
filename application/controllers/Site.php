<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function index()	{
		
		$this->home();
	}

	public function home() {

		$this->load->view('pages/home', $this->data);
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */