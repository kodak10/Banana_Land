<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'images',
        'disponible',
        'categories_id',
    ];

    public function categorieplat()
    {
        return $this->belongsTo(Categorie::class);
    }


}

