<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->language('admin', GE);
		$this->load->model(['User', 'Page']);
		$this->load->library(['Auth', 'session', 'form_validation', 'user_agent']);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			redirect(base_url('login'));
		}
	}

	public function index() {
		$this->pages();
	}

	public function pages() {

		$this->data['pages'] = $this->Page->get_navigation();
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


	public function add($type, $data) {

		$allowed = array(
			'Banner', 'Brand',
		);

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

		if(isset($data[$this->security->get_csrf_token_name()])) {
			unset($data[$this->security->get_csrf_token_name()]);
		}

		if($this->form_validation->run('add_'.$type)) {
			if($this->$type->add($data)) {

				if($type === 'Product') {

					$this->add_images($this->db->insert_id());
				}

				$this->message(lang('added_successfully'));
				$this->redirect();
			}

			else {
				$this->message(lang('unexpected_error'), ERRIR);
			}
		}

		else {
			$this->data['error_message'] = validation_errors('<div>', '</div>');
		}
	}

	public function edit($type, $data) {

		$allowed = array(
			'Banner', 'Page', 'Brand',
		);

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

		if(isset($data[$this->security->get_csrf_token_name()])) {
			unset($data[$this->security->get_csrf_token_name()]);
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

		$allowed = array(
			'Banner', 'Brand',
		);

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