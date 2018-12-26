<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\LeadMagnetHelper;

use Session;

class LeadMagnetsController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$lead_magnet_data = array(
    		"title" => $data->title,
    		"subtitle" => $data->subtitle,
    		"description" => $data->description,
    		"slug" => $data->slug,
            "image_url" => $data->image_url,
            "youtube_video_url" => $data->youtube_video_url
    	);
    	$lead_magnet_helper = new LeadMagnetHelper();
    	$lead_magnet_id = $lead_magnet_helper->create($lead_magnet_data);

    	return redirect(url('/admin/lead-magnets/view'));
    }

    public function read($slug) {
    	// Get lead magnet
    	$lead_magnet_helper = new LeadMagnetHelper();
    	$lead_magnet = $lead_magnet_helper->get_with_slug($slug);

    	// Dynamic page features
    	$page_title = $lead_magnet->title;

    	return view('pages.lp')->with('page_title', $page_title)->with('lead_magnet', $lead_magnet);
    }

    public function update(Request $data) {
    	// Get data
    	$lead_magnet_data = array(
    		"lead_magnet_id" => $data->lead_magnet_id,
    		"title" => $data->title,
    		"subtitle" => $data->subtitle,
    		"description" => $data->description,
    		"slug" => $data->slug,
            "image_url" => $data->image_url,
            "youtube_video_url" => $data->youtube_video_url
    	);
    	$lead_magnet_helper = new LeadMagnetHelper();
    	$lead_magnet_helper->update($lead_magnet_data);

    	return redirect(url('/admin/lead-magnets/view'));
    }

    public function delete(Request $data) {
    	// Get data
    	$lead_magnet_id = $data->lead_magnet_id;
    	$lead_magnet_helper = new LeadMagnetHelper($lead_magnet_id);
    	$lead_magnet_helper->delete();

    	return redirect(url('/admin/lead-magnets/view'));
    }

    public function view_lead_magnets() {
    	// Protect admin backend
    	$this->protect();

    	// Dynamic page features
    	$page_title = "Lead Magnets";
    	$page_header = $page_title;

    	// Get lead magnets
    	$lead_magnet_helper = new LeadMagnetHelper();
    	$lead_magnets = $lead_magnet_helper->get_all();

    	return view('admin.lead-magnets.view')->with('page_title', $page_title)->with('page_header', $page_header)->with('lead_magnets', $lead_magnets);
    }

    public function new_lead_magnet() {
    	// Protect admin backend
    	$this->protect();

    	// Dynamic page features
    	$page_title = "New Lead Magnet";
    	$page_header = $page_title;

    	return view('admin.lead-magnets.new')->with('page_title', $page_title)->with('page_header', $page_header);
    }

    public function edit_lead_magnet($lead_magnet_id) {
    	// Protect admin backend
    	$this->protect();

    	// Dynamic page features
    	$page_title = "Edit Lead Magnet";
    	$page_header = $page_title;

    	// Get lead magnet
    	$lead_magnet_helper = new LeadMagnetHelper($lead_magnet_id);
    	$lead_magnet = $lead_magnet_helper->read();

    	return view('admin.lead-magnets.edit')->with('page_title', $page_title)->with('page_header', $page_header)->with('lead_magnet', $lead_magnet);
    }

    /* Private functions */
    private function protect() {
        // Check to see if already logged in
        if (Session::has('admin_login')) {
            if (Session::get('admin_login') == false) {
                return redirect(url('/admin'));
            }
        } else {
            return redirect(url('/admin'));
        }
    }
}
