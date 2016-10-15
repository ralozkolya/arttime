<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends MY_Model {

	protected $table = 'social_links';

	public function get_links() {

		$raw = parent::get_list();

		foreach($raw as $r) {

			$links[$r->name] = $r->link;
		}

		return $links;
	}

	public function edit($data) {

		$this->db->update_batch($this->table, [
			[
				'name' => 'facebook_arttime',
				'link' => $this->prep_url($data['facebook_arttime']),
			],
			[
				'name' => 'facebook_swatch',
				'link' => $this->prep_url($data['facebook_swatch']),
			],
			[
				'name' => 'instagram',
				'link' => $this->prep_url($data['instagram']),
			],
			[
				'name' => 'youtube',
				'link' => $this->prep_url($data['youtube']),
			],
		], 'name');

		return TRUE;
	}

	private function prep_url($url) {

		if(empty($url) || $url === '#') {
			return $url;
		}

		else {
			return prep_url($url);
		}
	}

}

/* End of file Social.php */
/* Location: ./application/models/Social.php */