@extends('layouts.app')
@section('content')

<div class="container">
    <form method="post" action="{{ route('users.update', $user->id) }}">
        @method('PUT')
        @csrf
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="name" value="{{$user->name}}">
    </div>

    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="email" value="{{$user->email}}">
    </div>


    <button type="submit" class="btn btn-warning" style="margin-top: 10px">edit</button>

    </form>

</div>

@endsection
