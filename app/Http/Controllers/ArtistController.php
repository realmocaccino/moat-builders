<?php
namespace App\Http\Controllers;

use App\Http\Services\ArtistsService;
use App\Models\Album;

class ArtistController extends Controller
{
	public function albums(ArtistsService $artists, $artistId)
	{
        $albums = Album::whereArtistId($artistId)->get();
        $artist = $artists->find($artistId);
        
        foreach($albums as $album) {
            $album->artistName = $artist->name;
        }
 
        return view('albums.index', [
            'albums' => $albums,
            'artist' => $artist,
            'artistId' => $artistId
        ]);
	}
}