<?php
namespace App\Repositories;

use App\Models\Album;

class AlbumRepository
{
    public function all()
    {
        return Album::all();
    }
    
    public function find($id)
    {
       return Album::find($id); 
    }
    
    public function findOrFail($id)
    {
       return Album::findOrFail($id); 
    }

    public function create($data)
    {
        $album = new Album;
	    $album->name = $data->name;
	    $album->artist_id = $data->artist_id;
	    $album->year = $data->year;
	    $album->save();
	    
	    return $album;
    }
    
    public function update($id, $data)
    {
        $album = Album::findOrFail($id);
	    $album->name = $data->name;
	    $album->artist_id = $data->artist_id;
	    $album->year = $data->year;
	    $album->save();
	    
	    return $album;
    }
    
    public function delete($id)
    {
        Album::destroy($id);
    }
}