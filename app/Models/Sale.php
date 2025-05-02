<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        "product",
        "quantity",
        "amount",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}