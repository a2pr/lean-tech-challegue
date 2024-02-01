<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'expire_ts'
    ];

     /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            // Set a default value for the 'expire_ts'
            $model->expire_ts = now()->addMinutes(30);
        });
    }
}
