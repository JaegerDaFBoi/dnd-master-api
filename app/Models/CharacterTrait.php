<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function races(): BelongsToMany {
        return $this->belongsToMany(Race::class, 'race_has_traits', 'trait_fk', 'race_fk', 'character_trait_id', 'race_id');
    }
}
