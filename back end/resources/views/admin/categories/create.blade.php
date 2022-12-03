@extends('layouts.app')
@section('content')

<div class="container">
    <form method="post" action="{{ route('categories.store') }}" >
        @csrf
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="title">
    </div>

    <button type="submit" class="btn btn-success" style="margin-top: 10px">add</button>

    </form>

</div>

@endsection
