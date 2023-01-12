@extends('layouts.layout')
@section('content')
    @if(session('message'))
        <p class="text-center mt-3 text-success">{{session('message')}}</p>
    @endif
    <h1 class="text-center mt-3">Edit Books</h1>
    <form action="{{route('book.update', $book->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="col-lg-12 d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-8">
                <div class="input-group mb-3 col-lg-12">
                    <input type="text" value="{{ $book->name }}" name="name" class="form-control"
                        placeholder="Edit Book" aria-label="Book">
                </div>
                <div class="form-group mb-3">
                    <select class="select2 authors form-control" name="authors[]" multiple="multiple">
                        @foreach ($authors as $item)
                            <option value="{{ $item->id }}" {{ $book->authors->find($item->id) ? 'selected' : '' }}>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Edit books</button>
                </div>
            </div>
        </div>
    </form>
@endsection

