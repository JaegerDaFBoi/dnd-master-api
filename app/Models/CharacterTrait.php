<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterTrait extends Model
{
    use HasFactory;

    protected $table = 'character_traits';
    protected $primaryKey = 'character_trait_id';
    
    protected $fillable = [
        'trait_title',
        'trait_description',
        'trait_type',
        'trait_details'
    ];
}
