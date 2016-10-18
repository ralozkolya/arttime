<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->language('admin', GE);

		$this->load->model([
			'User', 'Page', 'Banner', 'Brand',
			'Branch', 'Branch_gallery', 'News',
			'Social', 'Shop',
		]);

		$this->load->library(['Auth', 'form_validation', 'user_agent']);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			redirect(base_url('login'));
		}
	}

	public function index() {
		
		$this->pages();
	}

	public function pages() {

		$this->data['pages'] = $this->Page->get_list();
		$this->data['highlighted'] = 'pages';
		$this->load->view('pages/admin/pages', $this->data);
	}

	public function page($id) {

		$post = $this->input->post();

		if($post) {

			if(!empty($post['id'])) {
				$this->edit('Page', $post);
			}
		}

		$this->data['page'] = $this->Page->get($id);
		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/page', $this->data);
	}

	public function banners() {

		$post = $this->input->post();

		if($post) {

			$config = [];
			$config['allowed_types'] = 'png|jpg|gif';
			$config['upload_path'] = 'static/uploads/banners/';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			if($this->upload->do_upload('image')) {

				$upload = $this->upload->data();
				$post['image'] = $upload['file_name'];

				$this->add('Banner', $post);
			}

			else {
				$this->data['error_message'] = $this->upload->display_errors();
			}
		}

		$this->data['highlighted'] = 'banners';
		$this->data['banners'] = $this->Banner->get_list();
		$this->data['priority'] = $this->Banner->get_next_priority();

		$this->load->view('pages/admin/banners', $this->data);
	}

	public function banner($id) {

		$post = $this->input->post();

		if($post) {
			$this->edit('Banner', $post);
		}

		$this->data['highlighted'] = 'banners';
		$this->data['banner'] = $this->Banner->get($id);

		$this->load->view('pages/admin/banner', $this->data);
	}

	public function brands() {

		$post = $this->input->post();

		if($post) {

			$this->load->library(['upload', 'image_lib']);

			$config = [];
			$config['allowed_types'] = 'png|jpg|gif';
			$config['upload_path'] = 'static/uploads/brands/';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if($this->upload->do_upload('image')) {

				$upload = $this->upload->data();

				$new_image = 'static/uploads/brands/thumbs/'.$upload['file_name'];

				if(isset($upload['full_path'])) {

					$config = [];
					$config['source_image'] = $upload['full_path'];
					$config['source_image'] = $upload['full_path'];
					$config['width'] = 400;
					$config['height'] = 300;
					$config['maintain_ratio'] = TRUE;
					$config['new_image'] = $new_image;

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}

				else {
					$this->data['error_message'] = $this->image_lib->display_errors();
				}

				$post['image'] = $upload['file_name'];

				$this->add('Brand', $post);

				if(file_exists($upload['full_path'])) {
					unlink($upload['full_path']);
				}

				if(file_exists($new_image)) {
					unlink($new_image);
				}
			}

			else {
				$this->data['error_message'] = $this->upload->display_errors();
			}
		}

		$this->data['highlighted'] = 'brands';
		$this->data['brands'] = $this->Brand->get_list();
		$this->data['priority'] = $this->Brand->get_next_priority();

		$this->load->view('pages/admin/brands', $this->data);
	}

	public function brand($id) {

		$post = $this->input->post();
		$new_image;

		if($post) {

			$this->load->library(['upload', 'image_lib']);

			$config = [];
			$config['allowed_types'] = 'png|jpg|gif';
			$config['upload_path'] = 'static/uploads/brands/';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if($this->upload->do_upload('image')) {

				$upload = $this->upload->data();

				$new_image = 'static/uploads/brands/thumbs/'.$upload['file_name'];

				if(!empty($upload['full_path'])) {

					$config = [];
					$config['source_image'] = $upload['full_path'];
					$config['source_image'] = $upload['full_path'];
					$config['width'] = 400;
					$config['height'] = 300;
					$config['maintain_ratio'] = TRUE;
					$config['new_image'] = $new_image;

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}

				else {
					$this->data['error_message'] = $this->image_lib->display_errors();
				}

				$post['image'] = $upload['file_name'];
			}

			else {
				$this->data['error_message'] = $this->upload->display_errors();
			}

			$this->edit('Brand', $post);

			if(!empty($upload)) {
				if(file_exists($upload['full_path'])) {
					unlink($upload['full_path']);
				}

				if(file_exists($new_image)) {
					unlink($new_image);
				}
			}
		}

		$this->data['highlighted'] = 'brands';
		$this->data['brand'] = $this->Brand->get($id);

		$this->load->view('pages/admin/brand', $this->data);
	}

	public function branches() {

		$post = $this->input->post();

		if($post) {
			$this->add('Branch', $post);
		}

		$this->data['branches'] = $this->Branch->get_list();
		$this->data['highlighted'] = 'branches';
		$this->load->view('pages/admin/branches', $this->data);
	}

	public function branch($id) {

		$post = $this->input->post();

		if($post) {
			$this->edit('Branch', $post);
		}
		
		$this->data['branch'] = $this->Branch->get($id);
		$this->data['gallery'] = $this->Branch_gallery->get_for_branch($id);
		$this->data['highlighted'] = 'branches';

		$this->load->view('pages/admin/branch', $this->data);
	}

	public function upload_images() {

		if(!$this->form_validation->run('add_images')) {
			$this->message(validation_errors(), ERROR);
			$this->redirect();
		}

		$this->add_images($this->input->post('branch'), TRUE);
		
		redirect($this->agent->referrer());
	}

	public function information() {

		$post = $this->input->post();

		if($post) {

			$this->load->library(['upload', 'image_lib']);

			$config = [];
			$config['allowed_types'] = 'png|jpg|gif';
			$config['upload_path'] = 'static/uploads/news/';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if($this->upload->do_upload('image')) {

				$upload = $this->upload->data();

				$new_image = 'static/uploads/news/thumbs/'.$upload['file_name'];

				if(isset($upload['full_path'])) {

					$config = [];
					$config['source_image'] = $upload['full_path'];
					$config['source_image'] = $upload['full_path'];
					$config['width'] = 400;
					$config['height'] = 300;
					$config['maintain_ratio'] = TRUE;
					$config['new_image'] = $new_image;

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}

				else {
					$this->data['error_message'] = $this->image_lib->display_errors();
				}

				$post['image'] = $upload['file_name'];

				$this->add('News', $post);

				if(file_exists($upload['full_path'])) {
					unlink($upload['full_path']);
				}

				if(file_exists($new_image)) {
					unlink($new_image);
				}
			}

			else {
				$this->data['error_message'] = $this->upload->display_errors();
			}
		}

		$this->data['highlighted'] = 'information';
		$this->data['information'] = $this->News->get_list();

		$this->load->view('pages/admin/information', $this->data);
	}

	public function post($id) {

		$post = $this->input->post();
		$new_image;

		if($post) {

			$this->load->library(['upload', 'image_lib']);

			$config = [];
			$config['allowed_types'] = 'png|jpg|gif';
			$config['upload_path'] = 'static/uploads/news/';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if($this->upload->do_upload('image')) {

				$upload = $this->upload->data();

				$new_image = 'static/uploads/news/thumbs/'.$upload['file_name'];

				if(!empty($upload['full_path'])) {

					$config = [];
					$config['source_image'] = $upload['full_path'];
					$config['source_image'] = $upload['full_path'];
					$config['width'] = 400;
					$config['height'] = 300;
					$config['maintain_ratio'] = TRUE;
					$config['new_image'] = $new_image;

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}

				else {
					$this->data['error_message'] = $this->image_lib->display_errors();
				}

				$post['image'] = $upload['file_name'];
			}

			else {
				$this->data['error_message'] = $this->upload->display_errors();
			}

			$this->edit('News', $post);

			if(!empty($upload)) {
				if(file_exists($upload['full_path'])) {
					unlink($upload['full_path']);
				}

				if(file_exists($new_image)) {
					unlink($new_image);
				}
			}
		}

		$this->data['highlighted'] = 'information';
		$this->data['post'] = $this->News->get($id);

		$this->load->view('pages/admin/post', $this->data);
	}

	public function user() {

		if($this->input->post()) {

			if($this->form_validation->run('change_password')) {

				$user = $this->data['user']->id;
				$password = $this->input->post('password');

				if($this->User->edit_password($user, $password)) {
					$this->data['success_message'] = lang('changed_successfully');
				}

				else {
					$this->data['error_message'] = lang('unexpected_error');
				}
			}

			else {
				$this->data['error_message'] = validation_errors('<div>', '</div>');
			}
		}

		$this->data['highlighted'] = 'user';

		$this->load->view('pages/admin/user', $this->data);
	}

	public function other() {

		if($this->input->post()) {
			$this->add('Shop');
		}

		$this->data['shops'] = $this->Shop->get_list();
		$this->data['social'] = $this->Social->get_links();

		$this->data['highlighted'] = 'other';
		$this->load->view('pages/admin/other', $this->data);
	}

	public function shop($id) {

		if($this->input->post()) {
			$this->edit('Shop');
		}

		$this->data['highlighted'] = 'other';
		$this->data['shop'] = $this->Shop->get($id);

		$this->load->view('pages/admin/shop', $this->data);
	}

	public function change_social() {

		if($this->input->post()) {

			$this->edit('Social');
		}

		$this->other();
	}


	public function add($type, $data = NULL) {

		$allowed = [
			'Banner', 'Brand', 'Branch', 'News', 'Shop',
		];

		$is_allowed = FALSE;

		foreach($allowed as $a) {
			if($type === $a) {
				$is_allowed = TRUE;
				break;
			}
		}

		if(!$is_allowed) {
			$this->redirect();
		}

		if(empty($data)) {
			$data = $this->input->post();
		}

		if($this->form_validation->run('add_'.$type)) {
			if($this->$type->add($data)) {

				if($type === 'Branch') {

					$this->add_images($this->db->insert_id());
				}

				$this->message(lang('added_successfully'));
				$this->redirect();
			}

			else {
				$this->message(lang('unexpected_error'), ERROR);
			}
		}

		else {
			$this->data['error_message'] = validation_errors('<div>', '</div>');
		}
	}

	public function edit($type, $data = NULL) {

		$allowed = [
			'Banner', 'Page', 'Brand', 'Branch',
			'News', 'Social', 'Shop',
		];

		$is_allowed = FALSE;

		foreach($allowed as $a) {
			if($type === $a) {
				$is_allowed = TRUE;
				break;
			}
		}

		if(!$is_allowed) {
			$this->redirect();
		}

		if(empty($data)) {
			$data = $this->input->post();
		}

		if($this->form_validation->run('edit_'.$type)) {

			if($this->$type->edit($data)) {
				$this->message(lang('changed_successfully'));
				$this->redirect();
			}

			else {
				$this->data['error_message'] = lang('unexpected_error');
			}
		}

		else {

			$this->data['error_message'] = validation_errors('<div>', '</div>');
		}
	}

	public function delete($type, $id) {

		$allowed = [
			'Banner', 'Brand', 'Branch', 'Branch_gallery',
			'News', 'Shop',
		];

		$is_allowed = FALSE;

		foreach($allowed as $a) {
			if($type === $a) {
				$is_allowed = TRUE;
				break;
			}
		}

		if(!$is_allowed) {
			$this->redirect();
		}

		if($this->$type->delete($id)) {
			$this->message(lang('deleted_successfully'));
		}

		else {
			$this->message(lang('unexpected_error'), ERROR);
		}

		$this->redirect();
	}


	private function add_images($branch, $display_error = FALSE) {

		$this->load->library(['image_lib', 'upload']);

		$config = [];
		$config['allowed_types'] = 'png|jpg|gif';
		$config['upload_path'] = 'static/uploads/branches/';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		$files = $_FILES;

		$cpt = count($_FILES['images']['name']);

		for($i = 0; $i < $cpt; $i++) {

			$_FILES['images']['name'] = $files['images']['name'][$i];
			$_FILES['images']['type'] = $files['images']['type'][$i];
			$_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
			$_FILES['images']['error'] = $files['images']['error'][$i];
			$_FILES['images']['size'] = $files['images']['size'][$i];

			if($this->upload->do_upload('images')) {

				$upload = $this->upload->data();

				if(isset($upload['full_path'])) {

					$config = [];
					$config['source_image'] = $upload['full_path'];
					$config['source_image'] = $upload['full_path'];
					$config['width'] = 300;
					$config['height'] = 300;
					$config['maintain_ratio'] = TRUE;
					$config['new_image'] = 'static/uploads/branches/thumbs/'.$upload['file_name'];

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}

				elseif($display_error) {
					$this->data['error_message'] = $this->image_lib->display_errors();
				}

				$data = [];

				$data['branch'] = $branch;
				$data['image'] = $upload['file_name'];

				$this->Branch_gallery->add($data);
			}

			elseif($display_error) {
				$this->message($this->upload->display_errors(), ERROR);
			}
		}
	}

	private function message($message, $type = SUCCESS) {
		$this->session->set_flashdata($type, $message);
	}

	private function redirect() {

		if($this->agent->referrer()) {
			redirect($this->agent->referrer());
		}

		redirect(base_url('admin'));
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */