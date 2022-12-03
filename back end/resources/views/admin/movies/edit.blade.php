@extends('layouts.app')
@section('content')

<div class="container">
    <form method="post" action="{{ route('movies.update', $movie->id) }}">
        @method('PUT')
        @csrf
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="title" value="{{$movie->title}}">
    </div>
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">description</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="description" value="{{$movie->description}}">
    </div>

    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">category</label>
             <select  name="category">
                <option selected value="{{$movie->category}}">{{$movie->category}}</option>
                @foreach ($categories as $item)
                <option value="{{$item->title}}">{{$item->title}} </option>
                @endforeach

             </select>
    </div>



    <button type="submit" class="btn btn-warning" style="margin-top: 10px">edit</button>

    </form>

</div>

@endsection
