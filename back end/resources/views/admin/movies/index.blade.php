@extends('layouts.app')
@section('content')
<div class="container">
    <div style="margin-top: 10px;">
        <form  method="GET" action="{{route('search')}}">

            <div style="display: flex;width: 37%;margin-bottom: 2%;float: left;">
                <input class="form-control mr-sm-2" name="search_field" type="search" placeholder="search" aria-label="Search" required>
                <select style="margin-left: 2%" name="type"  required>
                    <option value="title">
                        Name
                    </option>
                    <option value="category">
                        category
                    </option>
                    <option value="rate">
                        rate
                    </option>
                </select>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin-left: 2%">search</button>
            </div>
        </form>
    </div>
    <br>
    <a class="btn btn-success" href="{{ route('movies.create') }} ">add</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">rate</th>
            <th scope="col">img</th>
            <th scope="col">category</th>
            <th scope="col" >control</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($movies as $item )
            <tr>
                <td>
                    {{$item->title}}
                </td>
                <td>
                    {{$item->description}}
                </td>
                <td>
                    {{$item->rate}}
                </td>
                <td>

                    <img src="{{ asset('img/' .  $item->img) }}" alt=""
                    style="height: 110px;" >

                </td>
                <td>
                    {{$item->category}}
                </td>

                <td>
                    <a class="btn btn-warning" style=""
                        href="{{ route('movies.edit', $item->id) }}">edit</a>
                </td>
                <td>
                            <form method="POST" action="{{ route('movies.destroy', $item->id) }}">
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
