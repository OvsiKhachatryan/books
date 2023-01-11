@extends('layouts.layout')
@section('content')
    <h1 class="text-center mt-3">Add Books</h1>
    <form onsubmit="createBook(event, this)">
        <div class="col-lg-12 d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-8">
                <div class="input-group mb-3 col-lg-12">
                    <input type="text" name="name" class="form-control" placeholder="Book" aria-label="Book">
                </div>
                <div class="form-group mb-3">
                    <select class="authors form-control" name="authors[]" multiple="multiple">
                        @foreach ($authors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Add books</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/books.js') }}"></script>
@endsection
