<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MY_Model {

	protected $table = 'shops';

	public function get_list($limit = NULL, $offset = NULL) {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$this->table}.id",
			"{$this->table}.{$lang}_name as name",
			"{$this->table}.link",
		]);

		return parent::get_list();
	}

	public function add($data) {

		if(!empty($data['link'])) {
			$data['link'] = $this->prep_url($data['link']);
		}

		return parent::add($data);
	}

	public function edit($data) {

		if(!empty($data['link'])) {
			$data['link'] = $this->prep_url($data['link']);
		}

		return parent::edit($data);
	}

}

/* End of file Shops.php */
/* Location: ./application/models/Shops.php */