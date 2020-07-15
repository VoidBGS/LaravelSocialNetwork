@extends('layouts.app')
@section('title', "Forum")
 @section('content')
 <header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-2 bd-highlight">
    <h5 class="text-2xl text-light"><strong class="text-danger">{{$meme->title}}<strong class="text-danger"><div class="text-muted small">Posted on: {{$meme->created_at}}</div></strong></h5>
    </div>
</header>
 <div class="col-12 justify-content-start p-3 border border-white" id="articleForum" >
     <div class="row offset-md-1 mr-5 " id="articleForum">
         <div class="col-6 pr-3 border-bottom border-white" id="articleForum">
             <img src="/storage/{{ $meme->meme }}" class="p-3">
         </div>
         <div class="col-5 border-bottom border-white" id="articleForum">
             <div class="d-flex mt-3">
                 <img src="{{ $meme->user->profile->avatarImage() }}" href="#" class="rounded-circle"
                     style="max-width: 25px; max-height: 25px;">
                 <article class="pb-1 ml-1"><a href="/profile/{{ $meme->user->id }}"
                         class="text-danger">{{ $meme->user->name }}</a></article>
             </div>
             <article class="text-danger pt-2"><strong>{{ $meme->user->name }}</strong> <small>{{ $meme->description }}</small>
             </article>
             <hr>
             <div class="addOverflow">
                 @foreach($meme->comments as $comment)
                 <div class="d-flex pb-3">
                     <img src="{{ $comment->user->profile->avatarImage() }}" href="#" class="rounded-circle ml-1"
                         style="max-width: 25px; max-height: 25px;">
                     <article class="text-danger pl-1">{{ $comment->posted_by }}
                         <small>{{ $comment->content }}</small></article>
                 </div>
                 @endforeach
             </div>
             <div class="row">
                <div class="col p-3 bd-highlight">
                    @if ($errors->any())
                    <div class="mr-5 alert-danger" id="articleForum">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="POST" action="{{action('MemesController@postAddCommentMeme', ['id' => $meme->id, "user_id" => auth()->user()->id])}}">
                        @csrf
                    <textarea class="form-control form-group-sm" name="content"
                        rows="1"></textarea>
                        <div class="d-flex pt-2 bd-highlight">
                            <button type="submit" class="btn btn-sm btn-outline-danger px-5" id="articleForum">Post</button>
                        </div>
                    </form>
                </div>
             </div>
         </div>
     </div>
 </div>
 @endsection