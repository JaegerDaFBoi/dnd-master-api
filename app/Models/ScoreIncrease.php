<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreIncrease extends Model
{
    use HasFactory;

    protected $table = 'score_increases';
    protected $primaryKey = 'score_increase_id';
    public $timestamps = false;

    protected $fillable = [
        'str_inc',
        'dex_inc',
        'con_inc',
        'int_inc',
        'wis_inc',
        'cha_inc'
    ];

}
