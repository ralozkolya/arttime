<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Model {

	protected $table = 'news';

	public function get_list($offset = NULL, $limit = NULL) {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$lang}_title as title",
			"{$lang}_body as body",
			"slug", "image", "id",
		]);

		return parent::get_list();
	}

	public function get_post($id) {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$lang}_title as title",
			"{$lang}_body as body",
			"slug", "image", "id", "modified",
		]);

		return parent::get($id);
	}
}

/* End of file News.php */
/* Location: ./application/models/News.php */