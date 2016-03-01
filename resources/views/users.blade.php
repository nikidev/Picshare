@extends('app')

@section('content')

<div  style="text-align:center"><h3>See what the  other users are sharing!</h3></div>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" style="top:20px;">
			<div class="panel panel-default">
				<div class="panel-heading"><span class="glyphicon glyphicon-user"></span> Users</div>
				<div class="panel-body" id="users-feed">
					<ul>
						@foreach ($users as $user)
						<li>
							<a 
							href="{{ url('user/photos/' . $user->id) }}" ><span class="glyphicon glyphicon-user"> 
							{{ $user->name }}
							</a>
							 
							 @if(Auth::user()->isAdmin)
								<a class="remove-link" href="{{ url('user/delete/'. $user->id) }}">Delete</a>
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