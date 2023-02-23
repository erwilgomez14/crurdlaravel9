@extends('layouts.app')

@section('content')
<div class="container">

	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Permisions</th>
				<th>Tools</th>
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
				<th>
					<a href="/users/{{ $user->id }}"> <i class="fa fa-eye"></i></a>
					<a href="/users/{{ $user->id }}/edit/"><i class="fa fa-edit"></i></a>
					<a href="#" data-toogle="modal" data-target="#deleteModal" data-userid="{{$user['id']}}"><i class="fas fa-trash-alt"></i></a>

				</th>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}

</div>

@endsection