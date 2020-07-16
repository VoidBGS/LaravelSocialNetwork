@extends('layouts.app')
@section('title', "Forum")
@section('content')
<header class="border-bottom mb-2 px-2 rounded" id="articleForum">
    <div class="d-flex p-2 bd-highlight">
    <h5 class="text-2xl text-danger">{{$user->name}}'s posts</h5>
    </div>
</header>
<table class="table border border-white table-hover table-dark" id="articleForum">
@if($posts->count() > 0) 
@foreach ($posts as $p)
        <tbody class="border border-bottom-1 border-white rounded">
            <tr>
                <td class="text-light pl-1">
                    <h4 class="text-light pl-1"><a
                            href={{ action('ForumController@getForumPost', ['id' => $p->id]) }}
                            class="text-light">{{ $p->topic }}</h4>
                    <p class="text-light pl-1">Started by: <a href="/profile/{{$p->user->id}}" class="text-danger">{{ $p->user->name }}</p>
                </td>
                <td class="text-light pl-2">Date Posted:<br>{{ $p->created_at }}</td>
                <td class="text-light pl-3">By: {{ $p->last_post_by }} <br> On {{ $p->last_post_on }}</td>
            </tr>
        </tbody>
@endforeach
</table>
@else
<div class="d-flex border border-dark pb-3 bd-highlight justify-content-center" id="articleForum"
    style="height: 40px">
    <div class="text-danger">
        <h3>This user has no posts.</h3>
    </div>
</div>
@endif
@endsection