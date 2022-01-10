<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Services\ArtistsService;

class Album extends Model
{
    use HasFactory;
    
    public function artist()
    {
        return (new ArtistsService)->find($this->artist_id);
    }
}