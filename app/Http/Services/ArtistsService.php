<?php
namespace App\Http\Services;

use GuzzleHttp\Client;

class ArtistsService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Basic' => config('services.moat_builders.secret')
            ]
        ]);
    }
    
    private function get(string $endpoint): string
    {
        return $this->client->get($endpoint)->getBody()->getContents();
    }
    
    public function all(): array
    {
        $response = $this->get(config('services.moat_builders.endpoint'));
        
        return $this->addPictureAttribute($this->order($this->removeUnnecessaryArrays($this->json2array($response))));
    }
    
    public function find(string $id): object
    {
        $response = $this->get(config('services.moat_builders.endpoint') . '?artist_id=' . $id);
        
        $data = $this->addPictureAttribute($this->json2array($response));
         
        return $data[0];
    }
    
    private function json2array(string $response): array
    {
        return json_decode($response);
    }
    
    private function removeUnnecessaryArrays(array $data): array
    {
        return array_reduce($data, 'array_merge', array());
    }
    
    private function order(array $data): array
    {
        usort($data, function($a, $b) {
            return strcmp($a->name, $b->name);
        });
        
        return $data;
    }
    
    private function addPictureAttribute(array $data): array
    {
        foreach($data as $item) {
            $item->picture = 'storage/artists/' . str_replace('@', '', strtolower($item->twitter)) . '.jpeg';
        }
        
        return $data;
    }
}