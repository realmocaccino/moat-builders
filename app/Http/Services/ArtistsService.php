<?php
namespace App\Http\Services;

use GuzzleHttp\Client;

class ArtistsService
{
    protected $client;
    protected $response;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Basic' => config('services.moat_builders.secret')
            ]
        ]);
    }
    
    public function all()
    {
        $response = $this->get(config('services.moat_builders.endpoint'));
        
        return $this->treatResponse($response);
    }
    
    public function find($id)
    {
        $response = $this->get(config('services.moat_builders.endpoint') . '?artist_id=' . $id);
        
        return $this->json2array($response)[0];
    }
    
    private function get($endpoint)
    {
        return $this->client->get($endpoint)->getBody()->getContents();
    }
    
    private function treatResponse($response)
    {
        $data = $this->json2array($response);
        $data = $this->removeUnnecessaryArrays($data);
        $data = $this->order($data);
        $data = $this->addPictureAttribute($data);
    
        return $data;
    }
    
    private function json2array($response)
    {
        return json_decode($response);
    }
    
    private function removeUnnecessaryArrays($data)
    {
        return array_reduce($data, 'array_merge', array());
    }
    
    private function order($data)
    {
        usort($data, function($a, $b) {
            return strcmp($a->name, $b->name);
        });
        
        return $data;
    }
    
    private function addPictureAttribute($data)
    {
        foreach($data as $item) {
            $item->picture = 'storage/artists/' . str_replace('@', '', strtolower($item->twitter)) . '.jpeg';
        }
        
        return $data;
    }
}