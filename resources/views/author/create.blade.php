@extends('layouts.layout')
@section('content')
    @if(session('message'))
        <p class="text-center mt-3 text-success">{{session('message')}}</p>
    @endif
    <h1 class="text-center mt-3">Add Authors</h1>
    <form action="{{route('author.store')}}" method="POST">
        @csrf
        <div class="col-lg-12 d-flex justify-content-center align-items-center mt-5">
            <div class="col-lg-8">
                <div class="input-group mb-3 col-lg-12">
                    <input name="name" type="text" class="form-control" placeholder="Author" aria-label="Author">
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" id="add_authors" class="btn btn-primary">Add authors</button>
                </div>
            </div>
        </div>
    </form>
@endsection
