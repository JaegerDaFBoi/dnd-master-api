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

    public function retrieveRaceFeatures($id) {
        $features = RaceFeatures::where('race_features_fk', $id)->first();
        return $features;
    }

    public function updateRaceFeatures($featuresToUpdate, $features) {
        $features->size = $featuresToUpdate['size'];
        $features->walk_speed = $featuresToUpdate['walkSpeed'];
        $features->fly_speed = $featuresToUpdate['flySpeed'];
        $features->swim_speed = $featuresToUpdate['swimSpeed'];
        $features->languages = json_encode($featuresToUpdate['languages']);
        $features->save();
    }
}