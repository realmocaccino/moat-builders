<?php
namespace App\Http\Controllers;

use App\Models\Album;
use App\Http\Requests\AlbumRequest;
use App\Http\Services\ArtistsService;

class AlbumsController extends Controller
{
    protected $album;

    public function __construct()
    {
        $this->album = new Album;
    }

    public function index($artistId = null)
    {
        $albums = $this->album->when($artistId, function($query) use($artistId) {
            return $query->whereArtistId($artistId);
        })->get();
    
        return view('albums.index', [
            'albums' => $albums,
            'artistId' => $artistId
        ]);
    }

	public function createPage($artistId = null)
	{
	    $artists = [];
	
	    if(!$artistId) {
	        $artists = (new ArtistsService())->get();
	    }
	    
		return view('albums.create', [
		    'artistId' => $artistId,
		    'artists' => $artists
		]);
	}
	
	public function create(AlbumRequest $request)
	{
	    $album = new Album;
	    $album->name = $request->name;
	    $album->artist_id = $request->artist_id;
	    $album->year = $request->year;
	    $album->save();
	    
	    return redirect()->route('home');
	}
	
	public function editPage($albumId)
	{
	    $album = Album::findOrFail($albumId);
	
		return view('albums.edit', [
		    'album' => $album
		]);
	}
	
	public function edit(AlbumRequest $request, $albumId)
	{
	    $album = Album::findOrFail($albumId);
	    $album->name = $request->name;
	    $album->year = $request->year;
	    $album->save();
	    
	    return redirect()->route('artist.albums', $album->artist_id);
	}
	
	public function delete($albumId)
	{
	    
	}
}