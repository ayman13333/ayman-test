@extends('layouts.app')
@section('content')

<div class="container">
    <form method="post" action="{{ route('movies.store') }}" enctype="multipart/form-data">
        @csrf
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="title">
    </div>
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">description</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="description">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"> img</label>
        <input type="file" class="form-control" id="exampleInputPassword1" name="img" >
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1"> categories</label>
        <select name="category">
            @foreach ($categories as $item )
            <option value="{{$item->title}}">{{$item->title}} </option>

            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success" style="margin-top: 10px">add</button>

    </form>

</div>

@endsection
