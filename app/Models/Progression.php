<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Progression extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'location',
        'weather',
        'notes',
        'photo1_url',
        'photo2_url',
        'photo3_url',
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

    /*public function kite()
    {
        return $this->belongsTo(Kite::class);
    }
    */

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    //Pour définir la valeur de la colonne user_id à partir
    // de l'ID de l'utilisateur actuellement authentifié avec la méthode Auth::id().
    public static function booted()
    {
        //methode appele des que le modele soit instancie
        static::creating(function ($progression) {
            $progression->user_id = Auth::id();
        });
    }
}
