@extends('layouts.app')
@section('title', "Forum")
@section('content')
<div class="row justify-content-center border border-dark pt-1" id="paintItBlack">
    <div class="col-4 justify-content-center  offset-md-3  pb-4">
        @foreach($memes as $meme)
            <div class="d-flex justify-content-center">
                <div class="p-3" id="articleForum">
                    <div class="d-flex pl-1">
                        <img src="{{ $meme->user->profile->avatarImage() }}" href="#" class="rounded-circle"
                            style="max-width: 25px; max-height: 25px;">
                        <article class="pb-1 ml-1"><a href="/profile/{{ $meme->user->id }}"
                                class="text-danger">{{ $meme->user->name }}</a></article>
                    </div>
                    <a href="memes/id/{{ $meme->id }}"><img src="storage/{{ $meme->meme }}" class="py-1"></a>
                    <div class="d-flex">
                        @if($meme->comments->count() === 1)
                            <p class="text-light">{{ $meme->comments->count() }} comment</p>
                        @else
                            <p class="text-light">{{ $meme->comments->count() }} comments</p>
                        @endif
                        <div class="ml-auto pt-1">
                            @can('delete', $meme)
                                <form method="GET" action="memes/{{ $meme->id }}/delete">
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
                                        id="articleForum">Delete</button>
                                </form>
                            @endcan
                        </div>
                        <div class="pt-1">
                            <form method="GET" action="memes/{{ $meme->id }}/delete">
                                <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
                                    id="articleForum">Like</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-3 justify-content-end offset-md-1">
        <form method="GET" action="/memes/post">
            <div class="d-flex pt-4 bd-highlight">
                <button type="submit" class="btn btn-lg btn-outline-danger px-5" id="articleForum">Post a Meme</button>
        </form>
    </div>
</div>
</div>
@endsection