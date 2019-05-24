<?php

namespace App\Custom;

use App\Niche;
use App\NicheLink;
use App\NicheQuestion;
use App\NicheRecommendation;

class NicheHelper {

	public static function getNicheTitle($niche_id) {
		return Niche::find($niche_id)->title;
	}
	
	public static function getQuestions() {
		return NicheQuestion::where('is_active', 1)->get();
	}

	public static function getRecommendations(Request $data) {
		$questions = NicheQuestion::where('is_active', 1)->get();

		$niches = array();

		foreach($questions as $question) {
			$question_id = $question->id;
			$niche_id = $question->niche_id;
			$question_tag = "question_" + $question_id;

			$question_response = $data->input($question_tag);

			if (array_key_exists($niche_id, $niches)) {
				$niches[$niche_id] += 1;
			} else {
				$niche_id[$niche_id] = 1;
			}
		}

		rsort($niches);

		$recommendation = "[";
		for ($i = 0; $i < count($niches); $i++) {
			if ($i != (count($niches) - 1)) {
				$recommendation += $niches[$i] . "]";
			} else {
				$recommendation += $niches[$i] . ", ";
			}
		}

		return $recommendation;
	}

	public static function getAllNiches() {
		return Niche::where('is_active', 1)->get();
	}

	public static function getLinksForNiche($niche_id) {
		return NicheLink::where('niche_id', $niche_id)->where('is_active', 1)->get();
	}

	public static function getNumberOfLinksForNiche($niche_id) {
		return NicheLink::where('niche_id', $niche_id)->where('is_active', 1)->count();
	}

	public static function getQuestionsForNiche($niche_id) {
		return NicheQuestion::where('niche_id', $niche_id)->where('is_active', 1)->get();
	}

	public static function getNumberOfQuestionsForNiche($niche_id) {
		return NicheQuestion::where('niche_id', $niche_id)->where('is_active', 1)->count();
	}

	public static function getRecommendationsForUser($user_id) {
		return NicheRecommendation::where('user_id', $user_id)->get();
	}

}

?>