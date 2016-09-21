<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->data['navigation'] = $this->get_navigation();
	}

	public function index()	{
		
		$this->home();
	}

	public function home() {

		$this->data['banners'] = $this->get_banners();
		$this->load->view('pages/home', $this->data);
	}

	private function get_navigation() {

		if(get_lang() === GE) {
			return [
				(object)['title' => 'მთავარი'],
				(object)['title' => 'ბრენდები'],
				(object)['title' => 'ჩვენს შესახებ'],
				(object)['title' => 'სიახლეები'],
				(object)['title' => 'კონტაქტი'],
			];
		}

		else {
			return [
				(object)['title' => 'Home'],
				(object)['title' => 'Brands'],
				(object)['title' => 'About us'],
				(object)['title' => 'News'],
				(object)['title' => 'Contact'],
			];
		}
	}

	private function get_banners() {
		return [
			(object)['link' => '', 'blank' => FALSE, 'image' => 'banner.png'],
			(object)['link' => '', 'blank' => FALSE, 'image' => 'banner.png'],
		];
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */