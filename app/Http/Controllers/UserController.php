<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function UsersList()
	{

		return view('users')
			->with('users', User::all());
	}

	public function viewUserPhotos($id)
	{
		$user = User::findOrFail($id);

		return view('user-photos')
		->with('user', $user);
	}

	public function deleteUser($id)
	{
		$currentUser = User::findOrFail($id);

		foreach ($currentUser->photo as $photo) 
		{
			unlink(public_path($photo->file_path));
		}

		$currentUser->photo()->delete();
		$currentUser->delete();

		return redirect()->back();

	}


	public function showUserProfile()
	{
		return view('user-profile');
	}

	
}