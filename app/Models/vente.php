<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'panier_id',
        'qte',
    ];

    public function plat()
    {
        return $this->belongsTo(plat::class);
    }
}
