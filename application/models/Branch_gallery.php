<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_gallery extends MY_Model {

	protected $table = 'branches_gallery';

	public function get_for_branch($branch) {

		$this->db->where('branch', $branch);

		return parent::get_list();
	}

}

/* End of file Branch_gallery.php */
/* Location: ./application/models/Branch_gallery.php */