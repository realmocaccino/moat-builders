<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function index()
	{
		return view('login');
	}
	
	public function authenticate(LoginRequest $request)
	{
		if(Auth::attempt($request->only(['username', 'password']))) {
			return redirect()->route('home');
		} else {
			return back()->withInput()->withErrors(['failed-login' => trans('login.failed')]);
		}
	}
	
	public function logout()
	{
		Auth::logout();
		
		return redirect()->route('login.index');
	}
}