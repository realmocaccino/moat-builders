<?php
namespace App\Http\Controllers;

use App\Http\Services\ArtistsService;
use App\Models\Album;

class ArtistController extends Controller
{
	public function albums(ArtistsService $artists, $artistId)
	{
        $albums = Album::whereArtistId($artistId)->get();
        $artistName = $artists->find($artistId)->name;
        
        foreach($albums as $album) {
            $album->artistName = $artistName;
        }
 
        return view('albums.index', [
            'albums' => $albums,
            'artistId' => $artistId
        ]);
	}
}