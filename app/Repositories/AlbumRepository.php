<?php
namespace App\Repositories;

use App\Models\Album;
use App\Http\Requests\AlbumRequest;
use Illuminate\Database\Eloquent\Collection;

class AlbumRepository
{
    public function all(): Collection
    {
        return Album::all();
    }
    
    public function find(string $id): Album
    {
       return Album::find($id); 
    }
    
    public function findOrFail(string $id): Album
    {
       return Album::findOrFail($id); 
    }

    public function create(AlbumRequest $data): Album
    {
        $album = new Album;
	    $album->name = $data->name;
	    $album->artist_id = $data->artist_id;
	    $album->year = $data->year;
	    $album->save();
	    
	    return $album;
    }
    
    public function update(string $id, AlbumRequest $data): Album
    {
        $album = Album::findOrFail($id);
	    $album->name = $data->name;
	    $album->artist_id = $data->artist_id;
	    $album->year = $data->year;
	    $album->save();
	    
	    return $album;
    }
    
    public function delete(string $id): void
    {
        Album::destroy($id);
    }
}