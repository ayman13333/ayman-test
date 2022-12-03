@extends('layouts.app')
@section('content')
<div class="container">
    <a class="btn btn-success" href="{{ route('categories.create') }} ">add</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">title</th>
            <th scope="col" >control</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item )
            <tr>
                <td>
                    {{$item->title}}
                </td>

                <td>
                    <a class="btn btn-warning" style=""
                        href="{{ route('categories.edit', $item->id) }}">edit</a>
                </td>
                <td>
                            <form method="POST" action="{{ route('categories.destroy', $item->id) }}">
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
