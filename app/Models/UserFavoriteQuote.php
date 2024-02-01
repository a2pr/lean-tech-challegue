<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteQuote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quote',
    ];

    protected $casts = [
        'user_id' => 'integer'
    ];

    // Define the relationship with the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
