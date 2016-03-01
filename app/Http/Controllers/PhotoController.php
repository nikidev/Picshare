<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function viewPhotoList()
	{
		return view('home');
	}

	public function doPhotoUpload(Request $request)
	{
		$file = $request->file('file');
		$filename = uniqid() . $file->getClientOriginalName();
		$file->move('photos',$filename);

		//make a record in the database(creating the photo record)
		
		$photo = Auth::user()->photo()->create([

			'user_id'=> Auth::user()->id,
			'filename'=> $filename,
			'file_size'=> $file->getClientSize(),
			'file_mime'=> $file->getClientMimeType(),
			'file_path'=> 'photos/'. $filename,
			'created_by'=> Auth::user()->id,

		]);

		return $photo;
		
	}


	public function deletePhoto($id)
	{
		$currentPhoto = Photo::findOrFail($id);

		/*if($currentPhoto->user_id != Auth::user()->id )
		{
			abort('403','You do not have the permission to delete this photo!');
		}*/

		//$currentPhotos = Auth::user()->photo()->delete(); -- delete all the photos of the user
		 //delete only one record
		$currentPhoto->delete();

		return redirect()->back();

	}
}