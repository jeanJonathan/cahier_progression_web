<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'video_url',
        'level_id'
    ];

    public function level()
    {
        return $this->belongsTo('App\Level');
    }
}
