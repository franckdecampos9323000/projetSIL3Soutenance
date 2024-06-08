<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'etat', 'description', 'type', 'prix', 'image1', 'image2', 'image3', 'is_approved', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
