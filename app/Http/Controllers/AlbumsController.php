<?php
namespace App\Http\Controllers;

use App\Repositories\AlbumRepository;
use App\Http\Requests\AlbumRequest;
use App\Http\Services\ArtistsService;

class AlbumsController extends Controller
{
    public function index(AlbumRepository $albumRepository)
    {
        return view('albums.index', [
            'albums' => $albumRepository->all()
        ]);
    }

	public function createPage(ArtistsService $artists, $artistId = null)
	{
		return view('albums.create', [
		    'artists' => $artists->all(),
		    'artistId' => $artistId
		]);
	}
	
	public function create(AlbumRequest $request, AlbumRepository $albumRepository)
	{
	    $album = $albumRepository->create($request);
	    
	    return redirect()->route('artist.albums', $album->artist_id);
	}
	
	public function editPage(ArtistsService $artists, AlbumRepository $albumRepository, $albumId)
	{
	    $album = $albumRepository->findOrFail($albumId);
	
		return view('albums.edit', [
		    'artists' => $artists->all(),
		    'album' => $album
		]);
	}
	
	public function edit(AlbumRequest $request, AlbumRepository $albumRepository, $albumId)
	{
	    $album = $albumRepository->update($albumId, $request);
	    
	    return redirect()->route('artist.albums', $album->artist_id);
	}
	
	public function deletePage(AlbumRepository $albumRepository, $albumId)
	{
	    $album = $albumRepository->findOrFail($albumId);
	    
	    return view('albums.delete', [
		    'album' => $album
		]);
	}
	
	public function delete(AlbumRepository $albumRepository, $albumId)
	{
	    $album = $albumRepository->findOrFail($albumId);
	    $artistId = $album->artist_id;
	
	    $albumRepository->delete($albumId);
	
	    return redirect()->route('artist.albums', $artistId);
	}
}