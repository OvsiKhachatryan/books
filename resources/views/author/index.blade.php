@extends('layouts.layout')
@section('content')
    @if(session('message'))
        <p class="text-center mt-3 text-success">{{session('message')}}</p>
    @endif
    <h1 class="text-center mt-3">Authors</h1>
    <div class="ms-5">
        <a href="{{ route('author.create') }}" class="btn btn-primary">Add authors</a>
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Books</a>
    </div>
    <div class="col-lg-12 d-flex flex-column justify-content-center align-items-center">
        <div class="col-lg-11">
            <form action="{{route('book.index')}}" method="GET">
                <div class="col-lg-12 d-flex justify-content-end align-items-end m-4">
                <div class="col-lg-2 m-2">
                    <input class="form-control search" type="text" name="search" placeholder="Search..." value="{{ $search }}">
                </div>
                <div class="col-lg-2 m-2">
                    <select class="form-select sort-column" name="sort_column">
                        <option value="id" {{ $column == 'id' ? 'selected' : '' }}>Id</option>
                        <option value="name" {{ $column == 'name' ? 'selected' : '' }}>Name</option>
                    </select>
                </div>
                <div class="col-lg-2 m-2">
                    <select class="form-select sort" name="sort">
                        <option value="ASC" {{ $sort == 'ASC' ? 'selected' : '' }}>ASC</option>
                        <option value="DESC" {{ $sort == 'DESC' ? 'selected' : '' }}>DESC</option>
                    </select>
                </div>
                <div class="col-lg-2 m-2">
                    <button class="btn btn-secondary btn-filter">Filter</button>
                </div>
            </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Books</th>
                        <th class="text-center" scope="col">Edit</th>
                        <th class="text-center" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                @foreach ($item->books as $book)
                                    {{ $book->name . ($loop->last ? '' : ',') }}
                                @endforeach
                            </td>
                            <td class="text-center"><a href="{{ route('author.edit', $item->id) }}"
                                    class="btn btn-success col-lg-5">Edit</a>
                            </td>
                            <form action="{{ route('author.destroy', $item->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <td class="text-center"><button class="btn btn-danger btn-delete col-lg-5">Delete</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $authors->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

