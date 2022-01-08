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
        $response = $this->client->get(config('services.moat_builders.endpoint'));
        
        return json_decode($response->getBody()->getContents(), true);
    }
}