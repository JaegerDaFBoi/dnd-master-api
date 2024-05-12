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
}