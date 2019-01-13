<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Newsletter;

class NewsletterController extends Controller
{
    public function subscribe_user(Request $data) {
    	Newsletter::subscribe($data->email, ['FNAME' => $data->first_name, 'LNAME' => $data->last_name, 'SOURCE' => $data->source], $data->list_name);

    	return 'true';
    }
}
