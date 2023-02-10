@extends('layouts.app')

@section('content')
<div class="container">

	<table class="table">
		<thead>
			<tr>
				<th >ID</th>
				<th >Name</th>
				<th >Email</th>
				<th >Role</th>
				<th >Permisions</th>
				<th >Tools</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
			<tr>
				<th>{{$user->id}}</th>
				<th>{{$user->name}}</th>
				<th>{{$user->email}}</th>
				<th>#</th>
				<th>#</th>
				<th>#</th>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>

@endsection