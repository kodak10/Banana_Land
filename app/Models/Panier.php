<?php

namespace App\Models;

use App\Models\vente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'image',
        'description',
        'nom',
        'prix',
    ];

    public function categorieplat()
    {
        return $this->belongsTo(vente::class);
    }
}
