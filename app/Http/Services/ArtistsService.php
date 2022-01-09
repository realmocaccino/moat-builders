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
    
    public function get()
    {
        $response = $this->client->get(config('services.moat_builders.endpoint'))->getBody()->getContents();
        
        return $this->treat($response);
    }
    
    private function treat($json)
    {
        return $this->order(array_reduce(json_decode($json), 'array_merge', array()));
    }
    
    private function order($data)
    {
        usort($data, function($a, $b) {
            return strcmp($a->name, $b->name);
        });
        
        return $data;
    }
}