<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_gallery extends MY_Model {

	protected $table = 'branches_gallery';

	public function get_for_branch($branch) {

		$this->db->where('branch', $branch);

		return parent::get_list();
	}

	public function delete($id) {

		$img = $this->get($id);
		$path = 'static/uploads/branches/';

		$name = $path.$img->image;

		if(file_exists($name) && !is_dir($name)) {

			unlink($name);
		}

		$name = $path.'thumbs/'.$img->image;

		if(file_exists($name) && !is_dir($name)) {

			unlink($name);
		}

		return parent::delete($id);
	}

}

/* End of file Branch_gallery.php */
/* Location: ./application/models/Branch_gallery.php */