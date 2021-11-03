<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    use HasFactory;
    protected $table = "parrains" ;
    protected $fillable = [
        'nom',
        'email',
        "prenom",
        "matricule",
        "telephone",
        "sexe",
        "filiere",
        "niveau",
    ];
}
