@extends('layouts.app')
@section('content')

<div class="container">
    <form method="post" action="{{ route('users.store') }}" >
        @csrf
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="name">
    </div>
    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">email</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             name="email">
    </div>

    <div class="form-group" style="margin-top: 10px">
        <label for="exampleInputEmail1">rule</label>
        <select name="rule_id">
         <option value="1">admin</option>
         <option value="0">user</option>
        </select>
    </div>



    <button type="submit" class="btn btn-success" style="margin-top: 10px">add</button>

    </form>

</div>

@endsection
