<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'hours_needed',
        'video_url',
        'sport_id',
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function etape()
    {
        return $this->hasMany(Etape::class);
    }

    public function progressions()
    {
        return $this->hasMany(Progression::class);
    }
}
