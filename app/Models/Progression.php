<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progression extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_id',
        'date',
        'location',
        'weather',
        'notes',
        'photo_url',
        'video_url',
        'user_id',
        'etape_id',
        'surf_progression',
        'kite_progression',
        'wingfoil_progression'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etape()
    {
        return $this->belongsTo(Etape::class);
    }

    public function kite()
    {
        return $this->belongsTo(Kite::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
