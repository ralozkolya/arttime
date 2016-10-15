<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends MY_Model {

	protected $table = 'branches';

	public function get_list($limit = NULL, $offset = NULL) {

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
			"{$this->table}.slug",
			"branches_gallery.image"
		]);

		$this->db->join('branches_gallery',
			"branches_gallery.branch = {$this->table}.id", 'left');

		$this->db->group_by("{$this->table}.id");

		return parent::get_list();
	}

	public function get_locale($id) {

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
			"{$this->table}.slug",
		]);

		return parent::get($id);
	}

	public function add($data) {

		if(empty($data['slug'])) {
			$data['slug'] = $this->generate_slug($data['en_address']);
		}

		return parent::add($data);
	}

	public function delete($id) {

		$gallery = $this->Branch_gallery->get_for_branch($id);

		foreach($gallery as $g) {
			$this->Branch_gallery->delete($g->id);
		}

		return parent::delete($id);
	}

}

/* End of file Branch.php */
/* Location: ./application/models/Branch.php */