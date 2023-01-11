@extends('layouts.layout')
@section('content')
    <h1 class="text-center mt-3">Edit Authors</h1>
    <form onsubmit="editAuthor(event, this)">
        <input type="hidden" value="{{ $author->id }}" name="id">
        <div class="col-lg-12 d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-8">
                <div class="input-group mb-3 col-lg-12">
                    <input type="text" value="{{ $author->name }}" name="name" class="form-control"
                        placeholder="Edit Author" aria-label="Author">
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Edit author</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/authors.js') }}"></script>
@endsection
