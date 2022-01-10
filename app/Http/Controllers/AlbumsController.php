<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\AlbumRequest;
use App\Http\Services\ArtistsService;

class AlbumsController extends Controller
{
    public function index(ArtistsService $artists)
    {
        $albums = Album::all();
        $artists = $artists->all();
        $artistsNames = array_combine(array_column($artists, 'id'), array_column($artists, 'name'));
        
        foreach($albums as $album) {
            $album->artistName = $artistsNames[$album->artist_id];
        }
 
        return view('albums.index', [
            'albums' => $albums
        ]);
    }

	public function createPage(ArtistsService $artists, $artistId = null)
	{
		return view('albums.create', [
		    'artists' => $artists->all(),
		    'artistId' => $artistId
		]);
	}
	
	public function create(AlbumRequest $request)
	{
	    $album = new Album;
	    $album->name = $request->name;
	    $album->artist_id = $request->artist_id;
	    $album->year = $request->year;
	    $album->save();
	    
	    return redirect()->route('artist.albums', $album->artist_id);
	}
	
	public function editPage(ArtistsService $artists, $albumId)
	{
	    $album = Album::findOrFail($albumId);
	
		return view('albums.edit', [
		    'artists' => $artists->all(),
		    'album' => $album
		]);
	}
	
	public function edit(AlbumRequest $request, $albumId)
	{
	    $album = Album::findOrFail($albumId);
	    $album->name = $request->name;
	    $album->artist_id = $request->artist_id;
	    $album->year = $request->year;
	    $album->save();
	    
	    return redirect()->route('artist.albums', $album->artist_id);
	}
	
	public function delete($albumId)
	{
	    $album = Album::findOrFail($albumId);
	    $artistId = $album->artist_id;
	    $album->delete();
	
	    return redirect()->route('artist.albums', $artistId);
	}
}