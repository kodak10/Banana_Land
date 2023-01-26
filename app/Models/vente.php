<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'qte',
        'panier_id',
    ];

    public function plats()
    {
        return $this->hasMany(Plat::class, 'panier_id' ,'id');

    }
}
