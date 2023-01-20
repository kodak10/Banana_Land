<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'image'
    ];

    public function plat()
    {
        return $this->hasMany(Plat::class, 'categories_id' ,'id');

    }

}
