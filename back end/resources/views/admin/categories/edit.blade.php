@extends('layouts.app')
@section('content')

<div class="container">
    <form method="post" action="{{ route('categories.update', $category->id) }}">
        @method('PUT')
        @csrf
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="title" value="{{$category->title}}">
    </div>

    <button type="submit" class="btn btn-warning" style="margin-top: 10px">edit</button>

    </form>

</div>

@endsection
