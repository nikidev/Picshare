@extends('app')

@section('content')
	<img style="margin-left:44%; width:150px; height=150px;" src="{{ asset('/images/upload.png') }}">
	<div class="title" style="text-align:center"><h4>Upload a photo</h4></div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form action="{{ url('photo/do-upload') }}" class="dropzone" id="addPhotos">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			</form>
		</div>
	</div>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="top:20px;">
			<div class="panel panel-default">
				<div class="panel-heading">My Photos
					<span>
						({{Auth::user()->photo()->count()}})
					</span>
				</div>

				<div class="panel-body" id="photos-feed">
					<ul>
						@foreach (Auth::user()->photo as $photo)
						<li>
							<a href="{{ url($photo->file_path) }}" data-lightbox="myphotos">
								<img src="{{ url($photo->file_path) }}">
							</a>
							<a class="remove-link" href="{{ url('photo/delete/'. $photo->id) }}">Delete</a>
						</li>
						@endforeach
					</ul>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection


