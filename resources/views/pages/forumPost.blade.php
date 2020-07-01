@extends('layouts.app')
@section('title', "Forum Post")
@section('content')
<header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-2 bd-highlight">
    <h5 class="text-2xl text-light"><strong class="text-danger">Subject:</strong> {{$topic->topic}}</h5>
    </div>
</header>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header" id="articleForum">
                <div class="media flex-wrap w-100 align-items-center"> <img src="" class="d-block ui-w-40 rounded-circle img-thumbnail" alt="">
                <div class="media-body ml-3"> <a href="#" data-abc="true" class="text-danger">{{$topic->posted_by}}</a>
                        <div class="text-muted small">??? days ago</div>
                    </div>
                    <div class="text-muted small ml-3">
                        <!--POSSIBLE FUTURE EXTENSION
                            <div>Member since <strong>???</strong></div>
                        <div><strong>???</strong> posts</div>-->
                        <div class="d-flex justify-content-end bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                        <form method="GET" action="{{ action('ForumController@getModifyThread', ['id' => $topic->id])}}">
                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4" id="articleForum">Modify</button>
                        </form>
                    </div>
                    <div class="p-2 bd-highlight">
                        <form method="GET" action="{{ action('ForumController@getDeleteThread', ['id' => $topic->id])}}">
                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4" id="articleForum">Delete</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-body" id="articleForum">
            <p class="text-light">{{$topic->content}}</p>
            </div>
            <form method="GET" action="{{ action('CommentController@getAddComment', ['id' => $topic->id])}}">
            <div class="card-footer d-flex flex-wrap justify-content-between align-items-center px-0 pt-0 pb-3" id="articleForum">
                <button type="submit" class="btn btn-lg btn-outline-danger px-4 ml-4" id="articleForum">Reply</button>
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
                    <div class="media flex-wrap w-100 align-items-center"> <img src=""
                            class="d-block ui-w-40 rounded-circle img-thumbnail" alt="">
                        <div class="media-body ml-3"> <a href="#" data-abc="true"
                                class="text-danger">{{ $p->posted_by }}</a>
                            <div class="text-muted small">??? days ago</div>
                        </div>
                        <div class="text-muted small ml-3">
                            <!--POSSIBLE FUTURE EXTENSION
                            <div>Member since <strong>???</strong></div>
                        <div><strong>???</strong> posts</div>-->
                            <div class="d-flex justify-content-end bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    <form method="GET"
                                        action="{{ action('CommentController@getModifyComment', ['id' => $p->id]) }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
                                            id="articleForum">Modify</button>
                                    </form>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <form method="GET"
                                        action="{{ action('CommentController@getDeleteComment', ['id' => $p->id]) }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
                                            id="articleForum">Delete</button>
                                    </form>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="articleForum">
                    <p class="text-light">{{ $p->content }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
