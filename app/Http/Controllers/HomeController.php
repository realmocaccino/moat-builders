<?php
namespace App\Http\Controllers;

use App\Http\Services\ArtistsService;
use Illuminate\View\View;

class HomeController extends Controller
{
	public function index(ArtistsService $artists): View
	{
		return view('home', [
		    'artists' => $artists->all()
		]);
	}
}