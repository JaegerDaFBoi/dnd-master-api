<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceFeatures extends Model
{
    use HasFactory;

    protected $table = 'race_features';
    protected $primaryKey = 'race_feature_id';
    public $timestamps = false;
    
    protected $fillable = [
        'size',
        'walk_speed',
        'fly_speed',
        'swim_speed',
        'languages',
        'race_features_fk'
    ];
}
