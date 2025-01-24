<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = ['tournamentName', 'teamSize'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
