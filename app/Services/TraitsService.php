<?php

namespace App\Services;

use App\Models\CharacterTrait;

class TraitsService {

    public function saveTraits($traits, $model) {
        $traitsIds = [];
        $model = $model;
        foreach ($traits as $trait) {
            $traitToSave = new CharacterTrait();
            $traitToSave->trait_title = $trait['traitTitle'];
            $traitToSave->trait_description = $trait['traitDescription'];
            $traitToSave->trait_type = $trait['traitType'];
            $traitToSave->trait_details = json_encode($trait['traitDetails']);
            $traitToSave->save();
            $traitId = $traitToSave->character_trait_id;
            array_push($traitsIds, $traitId);
        }
        $this->attachTraitsToModel($traitsIds, $model);
    }

    public function attachTraitsToModel($ids, $model) { 
        foreach ($ids as $id => $idValue) {
            $model->traits()->attach(['trait_fk' => $idValue]);
        }
    }
}