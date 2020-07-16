@extends('layouts.app')
@section('title', "Post Reply")
@section('content')
<header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-2 bd-highlight">
    <h5 class="text-2xl text-danger">{{$actionTitle}}</h5>
    </div>
</header>
<div id="articleForum">

    @if ($errors->any())
    <div class="alert-danger" id="articleForum">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if ($action == "Post")
    <form method="POST" action="{{action('CommentController@postAddComment', ['id' => $post->id])}}">
    @elseif($action == "Modify")
        <form method="POST" action="{{action('CommentController@postModifyComment', ['id' => $post->id])}}">
    @elseif($action == "ModifyThread")
    <form method="POST" action="{{action('ForumController@postModifyThread', ['id' => $post->id])}}">
    @endif

   @csrf
        @if ($action == "Post")
    <div class="d-flex p-3 bd-highlight">
    <label class="text-danger">Subject:</label>
    <div class="input-group input-group-sm ml-4">
        <input type="text" class="form-control" aria-label="Sizing example input" value="RE: {{$post->topic}} " disable aria-describedby="inputGroup-sizing-sm" disabled> 
      </div>
    </div>
    @endif

    @if($action == "ModifyThread")
    <div class="d-flex p-3 bd-highlight">
        <label class="text-danger">Subject:</label>
        <div class="input-group input-group-sm ml-4">
            <input type="text" class="form-control" aria-label="Sizing example input" name="title" value="{{$post->topic}}" disable aria-describedby="inputGroup-sizing-sm"> 
          </div>
        </div>
   @endif

    <div class="d-flex p-3 bd-highlight">
        @if ($action == "Modify" || $action =="ModifyThread")
        <textarea class="form-control form-group-sm" name="content" rows="3" >{{$post->content}}</textarea>
        @else
    <textarea class="form-control form-group-sm" name="content" rows="3" >{{old('content')}}</textarea>
        @endif
    </div>

@if($action == "ModifyThread")
    <div class="d-flex p-3 bd-highlight">
        <button type="submit" class="btn btn-lg btn-outline-danger px-5" id="articleForum">Save</button>
    </div>
@else
    <div class="d-flex p-3 bd-highlight">
        <button type="submit" class="btn btn-lg btn-outline-danger px-5" id="articleForum">{{ $action }}</button>
    </div>
@endif

</form>
</div>
@endsection
@section('home')
<script src="https://cdn.tiny.cloud/1/sdw97xuzwo20qdpau4o6i34s54zr7pwmdnmltlyu45n6s993/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
<script>
     tinymce.init({
        forced_root_block : "",
        selector: 'textarea',
        width : 1100,
        plugins: "emoticons",
        menubar: false,
        toolbar: 'undo redo | bold italic underline | cut copy paste | emoticons',
      });

</script>
@endsection
