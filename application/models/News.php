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

	public function get_by_category($category) {

		$this->db->where('category', $category);
		return $this->get_list();
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

	public function add($data) {

		if(empty($data['slug'])) {
			$data['slug'] = $this->generate_slug($data['en_title']);
		}

		return parent::add($data);
	}

	public function edit($data) {

		if(!empty($data['image'])) {

			$link = $this->get($data['id']);
			$path = 'static/uploads/news/';

			$name = $path.$link->image;

			if(file_exists($name)) {
				unlink($name);
			}

			$name = $path.'thumbs/'.$link->image;

			if(file_exists($name)) {
				unlink($name);
			}
		}

		if(!empty($data['link'])) {
			$data['link'] = prep_url($data['link']);
		}

		return parent::edit($data);
	}

	public function delete($id) {

		$img = $this->get($id);
		$path = 'static/uploads/news/';

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

/* End of file News.php */
/* Location: ./application/models/News.php */