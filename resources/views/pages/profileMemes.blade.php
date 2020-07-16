@extends('layouts.app')
@section('title', "Forum")
 @section('content')
 @if($memes->count() > 0)
<div class="row justify-content-center border border-dark pt-1" id="paintItBlack">
<div class="col-4 justify-content-center  offset-md-3  pb-4">
  @foreach($memes as $meme)
  <div class="d-flex justify-content-end pr-5 mr-4">
    <div class="p-3" id="articleForum">
      <div class="d-flex pl-1">
      <img src="{{$meme->user->profile->avatarImage()}}" href="#" class="rounded-circle" style="max-width: 25px; max-height: 25px;" >
      <article class="pb-1 ml-1"><a href="/profile/{{$meme->user->id}}" class="text-danger">{{$meme->user->name}}</a></article>
      <div class="ml-auto">
        @can('delete', $meme)
      <form method="GET" action="memes/{{$meme->id}}/delete">
      <button type="submit" class="btn btn-sm btn-outline-danger px-4 ml-4"
          id="articleForum">Delete</button>
      </form>
      @endcan
    </div>
      </div>
    <a href="/memes/id/{{$meme->id}}"><img src="/storage/{{$meme->meme}}" class="py-1"></a>
    @if($meme->comments->count() === 1)
    <p class="text-light">{{$meme->comments->count()}} comment</p>
    @else
        <p class="text-light">{{$meme->comments->count()}} comments</p>
    @endif
      <hr>
    </div>
  </div>
  @endforeach
</div>
</div>
@else
<div class="d-flex border border-dark pb-3 bd-highlight justify-content-center" id="articleForum"
    style="height: 40px">
    <div class="text-danger">
        <h3>This user has not posted any memes.</h3>
    </div>
</div>
@endif
 @endsection