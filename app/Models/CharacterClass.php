<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CharacterClass extends Model
{
    use HasFactory;

    protected $table = "character_classes";
    protected $primaryKey = "character_class_id";

    protected $fillable = [
        'class_name',
        'class_description',
        'hit_points',
        'class_proficiencies',
        'saving_throws',
        'skill_proficiencies',
        'initial_equipment',
        'multiclassing_info'
    ];

    public function traits(): BelongsToMany {
        return $this->belongsToMany(CharacterTrait::class, 'character_class_has_traits', 'character_class_fk', 'trait_fk', 'character_class_id', 'character_trait_id');
    }
}
