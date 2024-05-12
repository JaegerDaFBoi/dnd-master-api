<?php

namespace App\Services;

use App\Models\RaceFeatures;

class RaceFeatureService {

    public function saveRaceFeatures($features, $id) {
        $raceFeatures = new RaceFeatures();
        $raceFeatures->size = $features['size'];
        $raceFeatures->walk_speed = $features['walkSpeed'];
        $raceFeatures->fly_speed = $features['flySpeed'];
        $raceFeatures->swim_speed = $features['swimSpeed'];
        $raceFeatures->languages = json_encode($features['languages']);
        $raceFeatures->race_features_fk = $id;
        $raceFeatures->save();
    }
}