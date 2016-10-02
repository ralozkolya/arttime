<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends MY_Model {

	protected $table = 'branches';

	public function get_list($offset = NULL, $limit = NULL) {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$this->table}.id",
			"{$this->table}.{$lang}_location as location",
			"{$this->table}.{$lang}_description as description",
			"{$this->table}.{$lang}_address as address",
			"{$this->table}.latitude",
			"{$this->table}.longitude",
			"{$this->table}.working_hours",
			"{$this->table}.phone",
			"branches_gallery.image"
		]);

		$this->db->join('branches_gallery',
			"branches_gallery.branch = {$this->table}.id");

		return parent::get_list();
	}

}

/* End of file Branch.php */
/* Location: ./application/models/Branch.php */