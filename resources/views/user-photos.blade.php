@extends('app')

@section('content')

<div  style="text-align:center"><h3>See what the  other users are sharing!</h3></div>



<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="top:20px;">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-user"></span> {{ $user->name }}</div>
				<div class="panel-body" id="photos-feed">
					
					<ul>
						@foreach ($user->photo as $photo)
						<li>
							<a href="{{ url($photo->file_path) }}" data-lightbox="myphotos">
								<img src="{{ url($photo->file_path) }}">
							</a>
							@if(Auth::user()->isAdmin)
							<a class="remove-link" href="{{ url('photo/delete/'. $photo->id) }}">Delete</a>
							@endif
						</li>
						@endforeach
					</ul>

				</div>
				
			</div>
		</div>
	</div>
</div>

@endsection