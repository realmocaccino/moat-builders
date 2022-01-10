<?php
namespace App\Http\Controllers;

use App\Http\Services\ArtistsService;

class HomeController extends Controller
{
	public function index(ArtistsService $artists)
	{
		return view('home', [
		    'artists' => $artists->all()
		]);
	}
}