@extends('layouts.layout')
@section('content')
    <h1 class="text-center mt-3">Edit Books</h1>
    <form onsubmit="editBook(event, this)">
        <input type="hidden" value="{{ $book->id }}" name="id">
        <div class="col-lg-12 d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-8">
                <div class="input-group mb-3 col-lg-12">
                    <input type="text" value="{{ $book->name }}" name="name" class="form-control"
                        placeholder="Edit Book" aria-label="Book">
                </div>
                <div class="form-group mb-3">
                    <select class="authors form-control" name="authors[]" multiple="multiple">
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
@section('scripts')
    <script src="{{ asset('assets/js/books.js') }}"></script>
@endsection
