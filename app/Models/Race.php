<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Race extends Model
{
    use HasFactory;

    protected $table = 'races';
    protected $primaryKey = 'race_id';
    
    protected $fillable = [
        'race_name',
        'race_description',
        'race_type',
    ];

    public function scoreIncreases(): HasOne {
        return $this->hasOne(ScoreIncrease::class, 'race_scores_fk', 'race_id');
    }

    public function raceFeatures(): HasOne {
        return $this->hasOne(RaceFeatures::class, 'race_features_fk', 'race_id');
    }

    public function traits(): BelongsToMany {
        return $this->belongsToMany(CharacterTrait::class, 'race_has_traits', 'race_fk', 'trait_fk', 'race_id', 'character_trait_id');
    }
}
