@extends('layouts.app')
@section('title', "New Forum Post")
@section('content')
<header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-2 bd-highlight">
        <h5 class="text-2xl text-danger">Create a new post</h5>
    </div>
</header>
<div id="articleForum">
    <form method="POST">
        {{ csrf_field() }}
    @if ($errors->any())
    <div class="alert-danger" id="articleForum">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="d-flex p-3 bd-highlight">
        <label class="text-danger">Subject:</label>
        <div class="input-group input-group-sm ml-4">
            <input type="text" class="form-control" aria-label="Sizing example input" name="title"
                value="{{ old('title') }}" disable aria-describedby="inputGroup-sizing-sm">
        </div>
    </div>
    <div class="d-flex p-3 bd-highlight">
        <textarea class="form-control form-group-sm" name="content"
            rows="3">{{ old('content') }}</textarea>
    </div>
    <div class="d-flex p-3 bd-highlight">
        <button type="submit" class="btn btn-lg btn-outline-danger px-5" id="articleForum">Create</button>
    </div>
    </form>
    </div>
@endsection
