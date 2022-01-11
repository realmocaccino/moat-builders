<?php
namespace App\Http\Controllers;

use App\Http\Services\ArtistsService;
use App\Models\Album;
use Illuminate\View\View;

class ArtistController extends Controller
{
	public function albums(ArtistsService $artists, $artistId): View
	{
        return view('albums.index', [
            'artist' => $artists->find($artistId),
            'albums' => Album::whereArtistId($artistId)->get()
        ]);
	}
}