<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panier extends Model
{
    use HasFactory;

    protected $fillable = [
        'plats_id',
    ];

    public function plat()
    {
        return $this->belongsTo(plat::class);
    }
}
