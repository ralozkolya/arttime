<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = array(
		'title' => 'Arttime',
	);

	public function __construct() {

		parent::__construct();

		$this->load->helper(array('language', 'cookie'));

		set_language();

		$this->load->language(array('general'));
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */