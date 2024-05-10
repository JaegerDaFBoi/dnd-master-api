<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $table = 'races';
    protected $primaryKey = 'race_id';
    
    protected $fillable = [
        'race_name',
        'race_description',
        'race_type',
        'score_increase_fk',
        'race_features_fk'
    ];
}
