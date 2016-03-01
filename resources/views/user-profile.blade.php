@extends('app')

@section('content')

<div style="text-align:center"><h3><span class="glyphicon glyphicon-user"></span> My profile</h3></div>

<ul style="text-align:center" >
	<li><h5>{{ Auth::user()->name }}</h5></li>
	<li><h5>Email:  {{ Auth::user()->email }} </h5></li>
	<li><h5>Registered on:  {{ Auth::user()->created_at->format("d.m.Y") }} </h5></li>
</ul>

@endsection