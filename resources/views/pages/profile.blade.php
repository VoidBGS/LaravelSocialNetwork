@extends('layouts.app')
@section('title', "Forum Post")
@section('content')
<header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-1 bd-highlight">
        <h5 class="text-2xl text-light"><strong class="text-danger">Profile Summary</strong></h5>
    </div>
</header>
<div class="d-flex justify-content-start p-5 rounded" id='articleForum'>
    <div class="col-2 mr-5">
        <img src="{{ $user->profile->avatarImage() }}" class="">
    </div>
    <div class="col-4 pl-3 ml-5 ">
        <p class="text-danger">Username: <strong>{{ $user->name }}</strong></p>
        <p class="text-danger">Role: <strong>{{ $user->title }}</strong></p>
        <p class="text-danger">Created On: <strong>{{ $user->created_at }}</strong></p>
        <p class="text-danger">Last Logged In: <strong>{{ $user->last_logged_in }}</strong></p>
        <p class="text-danger">Memes Posted: <strong>{{ $user->memes->count() }} <small><u><a
                            href="/profile/{{ $user->id }}/memes" class="text-danger">show</a></u></small></strong>
        </p>
        <p class="text-danger">Topics Created: <strong>{{ $user->posts->count() }} <small><u><a
                            href="/profile/{{ $user->id }}/topics" class="text-danger">show</a></u></small></strong>
        </p>
        <p class="text-danger">Comments Posted: <strong>{{ $user->comments->count() }} <small><u><a
            href="/profile/{{ $user->id }}/comments" class="text-danger">show</a></u></small></strong>
        </p>
    </div>
    <div class="col-5 ml-5">
        <div class="d-flex justify-content-end pl-1 ml-3">
            @can('update', $user->profile)
                <form method="GET" action="/profile/{{ $user->profile->id }}/edit">
                    <div class="bd-highlight pl-3">
                        <button type="submit" class="btn btn-lg btn-outline-danger px-5" id="articleForum">Edit
                            Profile</button>
                    </div>
                </form>
            @endcan
        </div>
    </div>
    <div>
    </div>
</div>
<div class="d-flex justify-content-start p-1 border-top rounded" id='articleForum'>
    <p class="text-danger pl-5 ml-2"><strong>Description:</strong> {{ $user->profile->description }}</p>
</div>


@endsection