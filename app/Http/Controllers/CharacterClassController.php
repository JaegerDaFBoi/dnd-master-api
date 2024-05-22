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
     * Display all character classes.
     */
    public function index()
    {
        $characterClasses = CharacterClass::all();
        return response()->json([
            "message" => "Busqueda realizada",
            "data" => $characterClasses
        ], 200);
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
        $this->traitsService->saveTraits($request['classTraits'], $newCharacterClass);

        return response()->json([
            "message" => "Clase agregada correctamente"
        ], 200);
    }

    /**
     * Display the details of specified class.
     */
    public function show($id)
    {
        $characterClass = CharacterClass::where('character_class_id', $id)
                            ->with('traits')
                            ->get();
        return response()->json([
            "message" => "Busqueda realizada",
            "data" => $characterClass
        ], 200);
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
    public function update(Request $request, $id)
    {
        $characterClass = CharacterClass::find($id);
        $this->traitsService->updateTraits($request['classTraits'], $characterClass);
        $characterClass->class_name = $request['className'];
        $characterClass->class_description = json_encode($request['classDescription']);
        $characterClass->hit_points = json_encode($request['hitPoints']);
        $characterClass->class_proficiencies = json_encode($request['classProficiencies']);
        $characterClass->saving_throws = json_encode($request['savingThrows']);
        $characterClass->skill_proficiencies = json_encode($request['skillProficiencies']);
        $characterClass->initial_equipment = json_encode($request['initialEquipment']);
        $characterClass->multiclassing_info = json_encode($request['multiclassingInfo']);
        $characterClass->save();

        return response()->json([
            "message" => "Registro actualizado correctamente"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CharacterClass $characterClass)
    {
        //
    }
} 
