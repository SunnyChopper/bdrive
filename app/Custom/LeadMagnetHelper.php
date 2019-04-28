<?php

namespace App\Custom;

use App\LeadMagnet;
use App\Lead;

class LeadMagnetHelper {
	/* Private global variables */
	private $id;

	/* Constructor */
	public function __construct($id = 0) {
		$this->id = $id;
	}

	/* Public functions */
	public function create($data) {
		$lead_magnet = new LeadMagnet;
		$lead_magnet->title = $data["title"];
		$lead_magnet->subtitle = $data["subtitle"];
		$lead_magnet->description = $data["description"];
		$lead_magnet->slug = $data["slug"];
		$lead_magnet->image_url = $data["image_url"];
		$lead_magnet->youtube_video_url = $data["youtube_video_url"];
		$lead_magnet->newsletter_id = $data["newsletter_id"];
		$lead_magnet->save();

		return $lead_magnet->id;
	}

	public function read($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		return LeadMagnet::find($id);
	}

	public function update($data) {
		$lead_magnet = LeadMagnet::find($data["lead_magnet_id"]);
		$lead_magnet->title = $data["title"];
		$lead_magnet->subtitle = $data["subtitle"];
		$lead_magnet->description = $data["description"];
		$lead_magnet->slug = $data["slug"];
		$lead_magnet->image_url = $data["image_url"];
		$lead_magnet->youtube_video_url = $data["youtube_video_url"];
		$lead_magnet->save();
	}

	public function delete($id = 0) {
		if ($id == 0) {
			$id = $this->id;
		}

		$lead_magnet = LeadMagnet::find($id);
		$lead_magnet->is_active = 0;
		$lead_magnet->save();
	}

	public function create_lead($data) {
		// Check for duplicate
		if (Lead::where('email', $data["email"])->where('lead_magnet_id', $data["lead_magnet_id"])->count() > 0) {
			return 0;
		} else {
			$lead = new Lead;
			$lead->name = $data["name"];
			$lead->email = $data["email"];
			$lead->lead_magnet_id = $data["lead_magnet_id"];
			$lead->save();

			return $lead->id;
		}
	}

	public function get_all() {
		return LeadMagnet::where('is_active', 1)->get();
	}

	public function get_all_with_pagination($pagination) {
		return LeadMagnet::where('is_active', 1)->paginate($pagination);
	}

	public function get_with_slug($slug) {
		return LeadMagnet::where('slug', $slug)->first();
	}
}