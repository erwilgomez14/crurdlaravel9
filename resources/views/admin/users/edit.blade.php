@extends('layouts.app')

@section('content')
<div class="container">
    <h2> EDIT PAGE </h2>

    <form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">

        @method('PATCH')
        @csrf()

        <div class="form-group">
            <label for="name"> User name </label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Name..." value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email"> User email </label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Email..." value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="password"> Password </label>
            <input type="text" name="password" class="form-control" id="password" placeholder="Password..." minlength="8">
        </div>

        <div class="form-group">
            <label for="password_confirmation"> Confirm Password </label>
            <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password...">
        </div>
            


        <div class="form-group pt-2">
            <input class="btn btn-primary" type="submit" value="Submit">            
        </div>
    </form>
</div>

@endsection