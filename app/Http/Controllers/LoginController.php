<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
	public function index(): View
	{
		return view('login');
	}
	
	public function authenticate(LoginRequest $request): RedirectResponse
	{
		if(Auth::attempt($request->only(['username', 'password']))) {
			return redirect()->route('home');
		} else {
			return back()->withInput()->withErrors(['failed-login' => trans('login.failed')]);
		}
	}
	
	public function logout(): RedirectResponse
	{
		Auth::logout();
		
		return redirect()->route('login.index');
	}
}