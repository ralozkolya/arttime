<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Model {

	protected $table = 'pages';

	public function get($id) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			'*', $lang.'_title as title',
		));

		return parent::get($id);
	}

	public function get_navigation() {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$lang}_title as title",
			'id', 'slug',
		]);

		$this->db->where('navigation', 1);

		return parent::get_list();
	}

	public function get_by_key($key, $value) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_title as title',
			$lang.'_body as body',
		));

		return parent::get_by_key($key, $value);
	}

}

/* End of file Page.php */
/* Location: ./application/models/Page.php */