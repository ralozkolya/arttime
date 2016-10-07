<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function __construct() {
		
		parent::__construct();

		set_language();

		$this->load->language(array('general'));

		$this->data['navigation'] = $this->get_navigation();
	}

	public function index()	{
		
		$this->home();
	}

	public function home() {

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

		$this->data['news'] = $this->get_news();
		$this->load->view('pages/news', $this->data);
	}

	public function post($id) {

		$this->data['slug'] = 'news';

		$this->data['post'] = $this->get_post($id);
		$this->load->view('pages/post', $this->data);
	}

	public function contact() {

		$this->data['slug'] = 'contact';

		$this->load->view('pages/contact', $this->data);
	}

	private function get_navigation() {

		if(get_lang() === GE) {
			return [
				(object) ['title' => 'მთავარი', 'slug' => 'home'],
				(object) ['title' => 'ბრენდები', 'slug' => '#brands',
					'scroll_to' => 'brands'],
				(object) ['title' => 'ჩვენს შესახებ', 'slug' => '#about_us',
					'scroll_to' => 'about_us'],
				(object) ['title' => 'ინფორმაცია', 'slug' => 'news'],
				(object) ['title' => 'კონტაქტი', 'slug' => 'contact'],
			];
		}

		else {
			return [
				(object) ['title' => 'Home', 'slug' => 'home'],
				(object) ['title' => 'Brands', 'slug' => '#brands',
					'scroll_to' => 'brands'],
				(object) ['title' => 'About us', 'slug' => '#about_us',
					'scroll_to' => 'about_us'],
				(object) ['title' => 'Information', 'slug' => 'news'],
				(object) ['title' => 'Contact', 'slug' => 'contact'],
			];
		}
	}

	private function get_banners() {
		return [
			(object) ['link' => '', 'blank' => FALSE, 'image' => 'banner.png'],
			(object) ['link' => '', 'blank' => FALSE, 'image' => 'banner.png'],
		];
	}

	private function get_brands() {

		return [
			(object) ['image' => 'longines.png'],
			(object) ['image' => 'swatch.png'],
			(object) ['image' => 'flik_flak.png'],
			(object) ['image' => 'calvin_klein.png'],
			(object) ['image' => 'swatch.png'],
			(object) ['image' => 'flik_flak.png'],
			(object) ['image' => 'calvin_klein.png'],
			(object) ['image' => 'longines.png'],
			(object) ['image' => 'flik_flak.png'],
			(object) ['image' => 'swatch.png'],
			(object) ['image' => 'longines.png'],
			(object) ['image' => 'calvin_klein.png'],
		];
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