<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;

class HomeController extends Controller
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

	public function index()
	{
        $response = $this->client->get(config('services.moat_builders.endpoint'));

		return view('home', [
		    'artists' => json_decode($response->getBody()->getContents(), true)
		]);
	}
}