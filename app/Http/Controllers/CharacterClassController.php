<?php

namespace App\Http\Controllers;

use App\Models\CharacterClass;
use App\Services\TraitsService;
use Illuminate\Http\Request;

class CharacterClassController extends Controller
{

    private $traitsService;

    public function __construct(TraitsService $traitsService)
    {
        $this->traitsService = $traitsService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Endpoint to create a new character class
     */
    public function store(Request $request)
    {
        $newCharacterClass = new CharacterClass();
        $newCharacterClass->class_name = $request['className'];
        $newCharacterClass->class_description = json_encode($request['classDescription']);
        $newCharacterClass->hit_points = json_encode($request['hitPoints']);
        $newCharacterClass->class_proficiencies = json_encode($request['classProficiencies']);
        $newCharacterClass->saving_throws = json_encode($request['savingThrows']);
        $newCharacterClass->skill_proficiencies = json_encode($request['skillProficiencies']);
        $newCharacterClass->initial_equipment = json_encode($request['initialEquipment']);
        $newCharacterClass->multiclassing_info = json_encode($request['multiclassingInfo']);
        $newCharacterClass->save();
        
        return response()->json([
            "message" => "Clase agregada correctamente"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(CharacterClass $characterClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CharacterClass $characterClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CharacterClass $characterClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CharacterClass $characterClass)
    {
        //
    }
}
