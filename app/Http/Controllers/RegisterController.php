<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function index(): View
	{
		return view('register');
	}
	
	public function submit(RegisterRequest $request): RedirectResponse
	{
	    $user = new User;
	    $user->name = $request->name;
		$user->username = $request->username;
		$user->password = bcrypt($request->password);
		$user->role = $request->role;
		$user->save();
		
		Auth::login($user);
	
		return redirect()->route('home');
	}
}