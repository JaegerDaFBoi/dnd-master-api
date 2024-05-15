<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Services\RaceFeatureService;
use App\Services\ScoreIncreaseService;
use App\Services\TraitsService;
use Illuminate\Http\Request;

class RaceController extends Controller
{

    private $scoreService;
    private $raceFeatureService;
    private $traitsService;

    public function __construct(
        ScoreIncreaseService $scoreIncreaseService, 
        RaceFeatureService $raceFeatureService,
        TraitsService $traitsService
        )
    {
        $this->scoreService = $scoreIncreaseService;
        $this->raceFeatureService = $raceFeatureService;
        $this->traitsService = $traitsService;
    }

    /**
     * Endpoint to list all races.
     */
    public function index()
    {
        $races = Race::all();
        return response()->json([
            "message" => "Busqueda realizada",
            "data" => $races
        ], 200);
    }

    /**
     * Endpoint to store a new race
     */
    public function store(Request $request)
    {
        $race = new Race();
        $raceData = $request->all();
        $race->race_name = $raceData['name'];
        $race->race_description = json_encode($raceData['description']);
        $race->race_type = $raceData['type'];
        $race->save();
        $raceId = $race->race_id;
        $this->scoreService->saveScoreIncreases($raceData['scoreIncreases'], $raceId);
        $this->raceFeatureService->saveRaceFeatures($raceData['raceFeatures'], $raceId);
        $this->traitsService->saveTraits($raceData['raceTraits'], $race);
        return response()->json([
            "message" => "Raza almacenada correctamente"
        ], 200);
    }

    /**
     * Endpoint to display specific race.
     */
    public function show($id)
    {
        $race = Race::where('race_id', $id)
                ->with('scoreIncreases')
                ->with('raceFeatures')
                ->with('traits')
                ->get();
        return response()->json([
            "message" => "Busqueda realizada correctamente",
            "data" => $race
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $race = Race::find($id);
        $scores = $this->scoreService->retrieveScoreIncreases($id);
        $features = $this->raceFeatureService->retrieveRaceFeatures($id);
        $this->scoreService->updateScoreIncreases($request['scoreIncreases'], $scores);
        $this->raceFeatureService->updateRaceFeatures($request['raceFeatures'], $features);
        $this->traitsService->updateRaceTraits($request['raceTraits'], $race);
        $race->race_name = $request['name'];
        $race->race_description = json_encode($request['description']);
        $race->race_type = $request['type'];
        $race->save();
        return response()->json([
            "message" => "Registro actualizado correctamente"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        //
    }
}
