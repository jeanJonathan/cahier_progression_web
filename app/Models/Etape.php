<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;
    protected $fillable = [
        'progression_id',
        'lieu',
        'date',
        'meteo',
        'video_url',
        'level_id'
    ];

    public function progression()
    {
        return $this->belongsTo('Progression::class');
    }

    public function level()
    {
        return $this->belongsTo('Level::class');
    }
}
