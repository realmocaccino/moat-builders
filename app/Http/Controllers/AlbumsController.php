<?php
namespace App\Http\Controllers;

use App\Repositories\AlbumRepository;
use App\Http\Requests\AlbumRequest;
use App\Http\Services\ArtistsService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AlbumsController extends Controller
{
    public function index(AlbumRepository $albumRepository): View
    {
        return view('albums.index', [
            'albums' => $albumRepository->all()
        ]);
    }

	public function createPage(ArtistsService $artists, string $artistId = null): View
	{
		return view('albums.create', [
		    'artists' => $artists->all(),
		    'artistId' => $artistId
		]);
	}
	
	public function create(AlbumRequest $request, AlbumRepository $albumRepository): RedirectResponse
	{
	    $album = $albumRepository->create($request);
	    
	    return redirect()->route('artist.albums', $album->artist_id);
	}
	
	public function editPage(ArtistsService $artists, AlbumRepository $albumRepository, string $albumId)
	{
	    $album = $albumRepository->findOrFail($albumId);
	
		return view('albums.edit', [
		    'artists' => $artists->all(),
		    'album' => $album
		]);
	}
	
	public function edit(AlbumRequest $request, AlbumRepository $albumRepository, string $albumId): RedirectResponse
	{
	    $album = $albumRepository->update($albumId, $request);
	    
	    return redirect()->route('artist.albums', $album->artist_id);
	}
	
	public function deletePage(AlbumRepository $albumRepository, $albumId): View
	{
	    $album = $albumRepository->findOrFail($albumId);
	    
	    return view('albums.delete', [
		    'album' => $album
		]);
	}
	
	public function delete(AlbumRepository $albumRepository, string $albumId): RedirectResponse
	{
	    $album = $albumRepository->findOrFail($albumId);
	    $artistId = $album->artist_id;
	
	    $albumRepository->delete($albumId);
	
	    return redirect()->route('artist.albums', $artistId);
	}
}