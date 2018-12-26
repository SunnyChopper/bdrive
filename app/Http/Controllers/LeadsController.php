<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Custom\LeadMagnetHelper;

use Session;

class LeadsController extends Controller
{
    public function create(Request $data) {
    	// Get data
    	$lead_data = array(
    		"lead_magnet_id" => $data->lead_magnet_id,
    		"name" => $data->name,
    		"email" => $data->email
    	);
    	$lead_magnet_helper = new LeadMagnetHelper();
    	$lead_magnet_helper->create_lead($lead_data);

    	return redirect()->back()->with('success', 'Successfully submitted.');
    }

    public function view_leads_for_lead_magnet($lead_magnet_id) {
    	// Protect admin backend
    	$this->protect();

    	// Get leads
    	$leads = Lead::where('lead_magnet_id', $lead_magnet_id)->get();

    	// Dynamic page features
    	$page_header = "Leads";
    	$page_title = $page_header;

    	return view('admin.lead-magnets.detail')->with('page_header', $page_header)->with('page_title', $page_title)->with('leads', $leads);
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
