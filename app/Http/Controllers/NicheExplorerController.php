<?php

namespace App\Http\Controllers;

use App\Niche;
use App\NicheLink;
use App\NicheQuestion;
use App\NicheRecommendation;
use Illuminate\Http\Request;

class NicheExplorerController extends Controller
{
    public function create_niche_recommendation(Request $data) {
    	$r = new NicheRecommendation;
    	$r->user_id = $data->user_id;
    	// TODO: Algorithm to get recommendations
    	$r->save();

    	return redirect(url('/members/niches/recommendations/' . $r->id));
    }

    public function read_niche_recommendation($r_id) {
    	$r = NicheRecommendation::find($r_id);
    	$page_title = "Niche Recommendations";
    	$page_header = $page_title;
    	return view('members.niches.view-recommendation')->with('page_title', $page_title)->with('page_header', $page_header)->with('recommendation', $r);
    }

    public function create_niche(Request $data) {
    	$niche = new Niche;
    	$niche->string('title', 128);
    	$niche->text('description');
    	$niche->save();

    	return redirect(url('/admin/niches'));
    }

    public function read_niche($niche_id) {
    	$niche = Niche::find($niche_id);
    	$links = NicheLink::where('niche_id', $niche_id)->get();
    	$page_title = $niche->title;
    	$page_header = $page_title;
    	return view('members.niches.view-niche')->with('page_title', $page_title)->with('page_header', $page_header)->wit('niche', $niche)->with('links', $links);
    }

    public function update_niche(Request $data) {
    	$niche = Niche::find($data->niche_id);
    	$niche->string('title', 128);
    	$niche->text('description');
    	$niche->save();

    	return redirect(url('/admin/niches'));
    }

    public function delete_niche(Request $data) {
    	$niche = Niche::find($data->niche_id);
    	$niche->is_active = 0;
    	$niche->save();

    	return redirect(url('/admin/niches'));
    }

    public function create_niche_link(Request $data) {
    	$niche_link = new NicheLink;
    	$niche_link->niche_id = $data->niche_id;
    	$niche_link->title = $data->title;
    	$niche_link->description = $data->description;
    	$niche_link->link = $data->link;
    	$niche_link->save();

    	return redirect(url('/admin/niches/links'));
    }

    public function update_niche_link(Request $data) {
    	$niche_link = NicheLink::find($data->link_id);
    	$niche_link->niche_id = $data->niche_id;
    	$niche_link->title = $data->title;
    	$niche_link->description = $data->description;
    	$niche_link->link = $data->link;
    	$niche_link->save();

    	return redirect(url('/admin/niches/links'));
    }

    public function delete_niche_link(Request $data) {
    	$niche_link = NicheLink::find($data->link_id);
    	$niche_link->is_active = 0;
    	$niche_link->save();

    	return redirect(url('/admin/niches/links'));
    } 

    public function create_niche_question(Request $data) {
    	$niche_question = new NicheQuestion;
    	$niche_question->niche_id = $data->niche_id;
    	$niche_question->question = $data->question;
    	$niche_question->save();

    	return redirect(url('/admin/niches/questions'));
    }

    public function update_niche_question(Request $data) {
    	$niche_question = NicheQuestion::find($data->question_id);
    	$niche_question->niche_id = $data->niche_id;
    	$niche_question->question = $data->question;
    	$niche_question->save();

    	return redirect(url('/admin/niches/questions'));
    }

    public function delete_niche_question(Request $data) {
    	$niche_question = NicheQuestion::find($data->question_id);
    	$niche_question->is_active = 0;
    	$niche_question->save();

    	return redirect(url('/admin/niches/questions'));
    }
}
