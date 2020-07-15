@extends('layouts.app')
@section('title', "Forum Post")
@section('content')
<div class="pb-2 mt-4 border border-dark" id="articleForum">
    @if ($errors->any())
    <div class="alert-danger" id="articleForum">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="d-flex justify-content-center">
        <h3 class="text-danger"><b>Post your shitty meme here</b></h3>
    </div>
    <hr class="mt-2">
    
    <form method="POST" action="/memes/post" enctype="multipart/form-data">
        @csrf
    <div class="row justify-content-center px-2">
        <div class="col-4 px-2">
            <div class="pt-2 mx-auto bd-highlight">
                <div class="d-flex justify-content-start">
                    <label class="text-danger pl-1">*Title</label>
                </div>
                <div class="input-group input-group-sm ml-1">
                    <input type="text" class="form-control" aria-label="Sizing example input" name="title" value=""
                        disable aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center px-2">
        <div class="col-4 p-2">
            <div class="pt-2 mx-auto bd-highlight">
                <div class="d-flex justify-content-start">
                    <label class="text-danger pl-1">Description</label>
                </div>
                <div class="input-group input-group-sm ml-1">
                    <input type="text" class="form-control" aria-label="Sizing example input" name="description" value=""
                        disable aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center px-2">
        <div class="col-4 p-2 mb-3">
            <div class="pt-2 mx-auto bd-highlight">
                <div class="d-flex justify-content-start">
                    <label class="text-danger ">*Image: </label>
                    <input type="file" class="form-control-file pl-2 text-danger" id="meme" name="meme">
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex pl-2 offset-sm-4 bd-highlight">
        <button type="submit" class="btn btn-lg btn-outline-danger px-5" id="articleForum">Create Meme</button>
    </div>
</form>
</div>
@endsection