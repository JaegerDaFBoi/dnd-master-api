<?php

namespace App\Services;

use App\Models\ScoreIncrease;

class ScoreIncreaseService {

    public function saveScoreIncreases($increases, $id) {
        $scoreIncreases = new ScoreIncrease();
        $filteredIncreases = [];
        foreach ($increases as $score => $scoreValue) {
            if ($scoreValue === 1) {
                $filteredIncreases[$score] = $scoreValue;
                $scoreIncreases->$score = $scoreValue;
            }
        }
        $scoreIncreases->race_scores_fk = $id;
        $scoreIncreases->save();
    }

    public function retrieveScoreIncreases($id) {
        $scores = ScoreIncrease::where('race_scores_fk', $id)->first();
        return $scores;
    }

    public function updateScoreIncreases($increasesToUpdate, $scores) {
        foreach ($increasesToUpdate as $score => $scoreValue) {
            if ($scoreValue != $scores->$score) {
                $scores->$score = $scoreValue;
            }
        }
        $scores->save();
    }
}