<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function __construct() {
		
		parent::__construct();

		set_language();

		$this->load->model('Page');

		$this->load->language(array('general'));

		$this->data['navigation'] = $this->get_navigation();
		$this->data['subnavigation'] = $this->get_navigation(TRUE);
	}

	public function index()	{
		
		$this->home();
	}

	public function home() {

		$this->data['page'] = $this->Page->get_by_key('slug', 'home');

		$this->data['banners'] = $this->get_banners();
		$this->data['brands'] = $this->get_brands();
		$this->data['branches'] = $this->get_branches();
		$this->data['slug'] = 'home';

		$this->load->view('pages/home', $this->data);
	}

	public function branch($id) {

		$this->data['branch'] = $this->get_branch($id);
		$this->data['gallery'] = $this->get_branch_gallery($id);
		$this->data['slug'] = 'about_us';

		$this->load->view('pages/about_us', $this->data);
	}

	public function news() {

		$this->data['slug'] = 'news';

		$this->data['page'] = $this->Page->get_by_key('slug', 'news');
		$this->data['news'] = $this->get_news();
		$this->load->view('pages/news', $this->data);
	}

	public function tips() {

		$this->data['slug'] = 'news';

		$this->data['page'] = $this->Page->get_by_key('slug', 'tips');
		$this->data['news'] = $this->get_news();
		$this->load->view('pages/news', $this->data);
	}

	public function service() {

		$this->data['slug'] = 'news';

		$this->data['page'] = $this->Page->get_by_key('slug', 'service');
		$this->data['news'] = $this->get_news();
		$this->load->view('pages/news', $this->data);
	}

	public function post($id) {

		$this->data['slug'] = 'news';

		$this->data['post'] = $this->get_post($id);
		$this->load->view('pages/post', $this->data);
	}

	public function contact() {

		$this->data['page'] = $this->Page->get_by_key('slug', 'contact');
		$this->data['slug'] = 'contact';

		$this->load->view('pages/contact', $this->data);
	}

	private function get_navigation($sub = FALSE) {

		$this->load->model('Page');

		return $this->Page->get_navigation($sub);
	}

	private function get_banners() {

		$this->load->model('Banner');
		return $this->Banner->get_list();
	}

	private function get_brands() {

		$this->load->model('Brand');

		return $this->Brand->get_list();
	}

	private function get_branches() {

		$this->load->model('Branch');

		return $this->Branch->get_list();
	}

	private function get_branch($id) {

		$this->load->model('Branch');

		return $this->Branch->get($id);
	}

	private function get_branch_gallery($branch) {

		$this->load->model('Branch_gallery');

		return $this->Branch_gallery->get_for_branch($branch);
	}

	private function get_news() {

		$this->load->model('News');

		return $this->News->get_list();
	}

	private function get_post($id) {

		$this->load->model('News');

		return $this->News->get_post($id);
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */