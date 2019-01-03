<?php

namespace App\Custom;

use App\ContentBank;

class ContentBankHelper {
	/* Private global variables */
	private $id;

	/* Constructor */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	/* Public functions */
	public function create($data) {
		$content_bank = new ContentBank;
		$content_bank->post_user_id = $data["author_id"];
		$content_bank->description = $data["description"];
		$content_bank->image_url = $data["image_url"];
		$content_bank->category = $data["category"];
		$content_bank->save();

		return $content_bank->id;
	}

	public function read($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return ContentBank::find($id);
	}

	public function update($data) {
		$content_bank = ContentBank::find($data["post_id"]);
		$content_bank->post_user_id = $data["author_id"];
		$content_bank->description = $data["description"];
		$content_bank->image_url = $data["image_url"];
		$content_bank->category = $data["category"];
		$content_bank->save();
	}

	public function delete($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		$content_bank = ContentBank::find($id);
		$content_bank->is_active = 0;
		$content_bank->save();
	}

	public function get_all() {
		return ContentBank::where('is_active', 1)->get();
	}

	public function get_all_with_pagination($pagination) {
		return ContentBank::where('is_active', 1)->paginate($pagination);
	}

	public function get_all_from_user($user_id) {
		return ContentBank::where('post_user_id', $user_id)->where('is_active', 1)->get();
	}
}