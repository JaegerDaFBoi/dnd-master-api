<?php

namespace App\Services;

use App\Models\CharacterTrait;
use App\Models\Race;

class TraitsService
{

    public function saveTraits($traits, $model)
    {
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

    public function attachTraitsToModel($ids, $model)
    {
        foreach ($ids as $id => $idValue) {
            $model->traits()->attach(['trait_fk' => $idValue]);
        }
    }

    public function retrieveRaceTraits(Race $race)
    {
        $traits = $race->traits()->get();
        return $traits;
    }

    public function updateRaceTraits($traitsToUpdate, Race $race)
    {
        $newTraits = [];
        foreach ($traitsToUpdate as $trait) {
            $searchedTrait = CharacterTrait::where('trait_title', $trait['traitTitle'])->first();
            $traitExists = $searchedTrait !== null;
            if ($traitExists) {
                $existingTrait = $searchedTrait;
                if ($trait['deleteFromDB'] === true) {
                    $race->traits()->detach([$existingTrait->character_trait_id]);
                    $existingTrait->delete();
                } elseif ($trait['deleteFromModel'] === true) {
                    $race->traits()->detach([$existingTrait->character_trait_id]);
                } else {
                    $existingTrait->trait_title = $trait['traitTitle'];
                    $existingTrait->trait_description = $trait['traitDescription'];
                    $existingTrait->trait_type = $trait['traitType'];
                    $existingTrait->trait_details = json_encode($trait['traitDetails']);
                    $existingTrait->save();
                }
            } else {
                $newTrait = new CharacterTrait();
                $newTrait->trait_title = $trait['traitTitle'];
                $newTrait->trait_description = $trait['traitDescription'];
                $newTrait->trait_type = $trait['traitType'];
                $newTrait->trait_details = json_encode($trait['traitDetails']);
                $newTrait->save();
                $traitId = $newTrait->character_trait_id;
                array_push($newTraits, $traitId);
            }
        }
        if (count($newTraits) > 0) {
            $this->attachTraitsToModel($newTraits, $race);
        }
    }
}
