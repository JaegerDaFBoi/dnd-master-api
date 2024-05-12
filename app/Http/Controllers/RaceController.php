<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Services\RaceFeatureService;
use App\Services\ScoreIncreaseService;
use Illuminate\Http\Request;

class RaceController extends Controller
{

    private $scoreService;
    private $raceFeatureService;

    public function __construct(ScoreIncreaseService $scoreIncreaseService, RaceFeatureService $raceFeatureService)
    {
        $this->scoreService = $scoreIncreaseService;
        $this->raceFeatureService = $raceFeatureService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $race->race_type = $raceData['description'];
        $race->save();
        $raceId = $race->race_id;
        $scoreIncreases = $raceData['scoreIncreases'];
        $raceFeatures = $raceData['raceFeatures'];
        $this->scoreService->saveScoreIncreases($scoreIncreases, $raceId);
        $this->raceFeatureService->saveRaceFeatures($raceFeatures, $raceId);
    }

    /**
     * Display the specified resource.
     */
    public function show(Race $race)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Race $race)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Race $race)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        //
    }
}
