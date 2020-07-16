@extends('layouts.app')
@section('title', "Forum Post")
@section('content')
<header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-2 bd-highlight">
    <h5 class="text-2xl text-light"><strong class="text-danger">Subject:</strong> {{$topic->topic}} <strong class="text-danger"><div class="text-muted small">Posted on: {{$topic->created_at}}</div></strong></h5>
    </div>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header" id="articleForum">
                <div class="media flex-wrap w-100 align-items-center"> <img src="{{$topic->user->profile->avatarImage()}}" class="d-block ui-w-40 rounded-circle" style="max-width: 120px" alt="">
                <div class="media-body ml-3"> <a href="/profile/{{$topic->user->id}}" data-abc="true" class="text-danger">{{$topic->user->name}}</a>
                    <div class="text-muted small"><strong>{{$topic->user->title}}</strong></div>
                <div class="text-muted small">Registered on: <strong>{{substr($topic->user->created_at, 0 , 10)}}</strong></div>
                <div class="d-flex">
                    @if($topic->user->posts->count() === 1)
                    <div class="text-muted small"><strong>{{$topic->user->posts->count()}}</strong> post</div>
                    @else
                    <div class="text-muted small"><strong>{{$topic->user->posts->count()}}</strong> posts</div>
                    @endif
                    @if($topic->user->comments->count() === 1)
                    <div class="text-muted small pl-3"><strong>{{$topic->user->comments->count()}}</strong> comment</div>
                    @else
                    <div class="text-muted small pl-3"><strong>{{$topic->user->comments->count()}}</strong> comments</div>
                    @endif
                    </div>
                    </div>
                    <div class="text-muted small ml-3">
                        @can('update', $topic)
                        <div class="d-flex justify-content-end bd-highlight mb-3">
                            <div class="p-2 bd-highlight">

                        <form method="GET" action="{{ action('ForumController@getModifyThread', ['id' => $topic->id])}}">
                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4" id="articleForum">Modify</button>
                        </form>
                    </div>
                    @endcan
                    @can('delete', $topic)
                    <div class="p-2 bd-highlight">
                        <form method="GET" action="{{ action('ForumController@getDeleteThread', ['id' => $topic->id])}}">
                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4" id="articleForum">Delete</button>
                        </form>
                    </div>
                    </div>
                    @endcan
                    
                </div>
                </div>
            </div>
            <div class="card-body" id="articleForum">
            <p class="text-light">{{$topic->content}}</p>
            </div>
            <form method="GET" action="{{ action('CommentController@getAddComment', ['id' => $topic->id])}}">
            <div class="card-footer d-flex flex-wrap justify-content-end align-items-center px-0 pt-0 pb-3" id="articleForum">
                <button type="submit" class="btn btn-lg btn-outline-danger px-4 pt-1 mt-2 mr-3" id="articleForum">Reply</button>
            </div>
        </div>
    </div>
</div>
</form>
@foreach ($posts as $p)
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header" id="articleForum">
                    <div class="d-flex justify-content-end">
                        <div class="text-muted small">Posted on: {{$p->posted_on}}</div>
                    </div>
                <div class="media flex-wrap w-100 align-items-center"> <img src="{{$p->user->profile->avatarImage()}}" class="d-block ui-w-40 rounded-circle" style="max-width: 120px" alt="">
                        <div class="media-body ml-3"> <a href="/profile/{{$p->user->id}}" data-abc="true" class="text-danger">{{ $p->posted_by }}</a>
                        <div class="text-muted small"><strong>{{$p->user->title}}</strong></div>
                        <div class="text-muted small">Registered on: <strong>{{substr($p->user->created_at, 0 , 10)}}</strong></div>
                        <div class="d-flex">
                        @if($p->user->posts->count() === 1)
                        <div class="text-muted small"><strong>{{$p->user->posts->count()}}</strong> post</div>
                        @else
                        <div class="text-muted small"><strong>{{$p->user->posts->count()}}</strong> posts</div>
                        @endif
                        @if($p->user->comments->count() === 1)
                        <div class="text-muted small pl-3"><strong>{{$p->user->comments->count()}}</strong> comment</div>
                        @else
                        <div class="text-muted small pl-3"><strong>{{$p->user->comments->count()}}</strong> comments</div>
                        @endif
                        </div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div class="d-flex justify-content-end bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    @can('update', $p)
                                    <form method="GET"
                                        action="{{ action('CommentController@getModifyComment', ['id' => $p->id]) }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
                                            id="articleForum">Modify</button>
                                    </form>
                                    @endcan
                                </div>
                                <div class="p-2 bd-highlight">
                                    @can('delete', $p)
                                    <form method="GET"
                                        action="{{ action('CommentController@getDeleteComment', ['id' => $p->id]) }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
                                            id="articleForum">Delete</button>
                                </form>
                                @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="articleForum">
                    <div class="text-light">{!! $p->content !!}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
