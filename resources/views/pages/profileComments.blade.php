@extends('layouts.app')
@section('title', "Forum")
 @section('content')
 <header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-2 bd-highlight">
    <h5 class="text-2xl text-danger">{{$user->name}}'s comments</h5>
    </div>
</header>
@foreach ($comments as $comment)
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header" id="articleForum">
                <h4><a class="text-danger" href="/forum/post/{{$comment->post->id}}">{{$comment->post->topic}}</a></h4>
                    <div class="d-flex justify-content-end">
                        <div class="text-muted small">Posted on: {{$comment->posted_on}}</div>
                    </div>
                <div class="media flex-wrap w-100 align-items-center"> <img src="{{$comment->user->profile->avatarImage()}}" class="d-block ui-w-40 rounded-circle" style="max-width: 120px" alt="">
                        <div class="media-body ml-3"> <a href="/profile/{{$comment->user->id}}" data-abc="true" class="text-danger">{{ $comment->posted_by }}</a>
                        <div class="text-muted small"><strong>{{$comment->user->title}}</strong></div>
                        <div class="text-muted small">Registered on: <strong>{{substr($comment->user->created_at, 0 , 10)}}</strong></div>
                        <div class="d-flex">
                        @if($comment->user->posts->count() === 1)
                        <div class="text-muted small"><strong>{{$comment->user->posts->count()}}</strong> post</div>
                        @else
                        <div class="text-muted small"><strong>{{$comment->user->posts->count()}}</strong> posts</div>
                        @endif
                        @if($comment->user->comments->count() === 1)
                        <div class="text-muted small pl-3"><strong>{{$comment->user->comments->count()}}</strong> comment</div>
                        @else
                        <div class="text-muted small pl-3"><strong>{{$comment->user->comments->count()}}</strong> comments</div>
                        @endif
                        </div>
                        </div>
                        <div class="text-muted small ml-3">
                            <div class="d-flex justify-content-end bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    @can('update', $comment)
                                    <form method="GET"
                                        action="{{ action('CommentController@getModifyComment', ['id' => $comment->id]) }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
                                            id="articleForum">Modify</button>
                                    </form>
                                    @endcan
                                </div>
                                <div class="p-2 bd-highlight">
                                    @can('delete', $comment)
                                    <form method="GET"
                                        action="{{ action('CommentController@getDeleteComment', ['id' => $comment->id]) }}">
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
                    <div class="text-light">{!! $comment->content !!}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection