@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-success" href="{{ route('users.create') }} ">add</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col" >control</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $item )
            <tr>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->email}}
                </td>

                <td>
                    <a class="btn btn-warning" style=""
                        href="{{ route('users.edit', $item->id) }}">edit</a>
                </td>
                <td>
                            <form method="POST" action="{{ route('users.destroy', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                </td>
            </tr>

            @endforeach

        </tbody>

      </table>

</div>
@endsection
