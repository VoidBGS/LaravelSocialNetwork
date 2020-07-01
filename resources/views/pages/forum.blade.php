@extends('layouts.app')
@section('title', "Forum")
@section('content')
    <table class="table border border-white table-hover table-dark" id="articleForum">
        <thead>
            <tr>
                <th scope="col" class="text-danger">Subject/Posted By</th>
                <th scope="col" class="text-danger">Posted On</th>
                <th scope="col" class="text-danger">Last Post</th>
            </tr>
        </thead>
    @foreach ($posts as $p)
            <tbody class="border border-bottom-1 border-white rounded">
                <tr>
                    <td class="text-light pl-1">
                        <h4 class="text-light pl-1"><a
                                href={{ action('ForumController@getForumPost', ['id' => $p->id]) }}
                                class="text-light">{{ $p->topic }}</h4>
                        <p class="text-light pl-1">Started by: <a href="#" class="text-danger">{{ $p->user->name }}</p>
                    </td>
                    <td class="text-light pl-2">Date Posted:<br>{{ $p->created_at }}</td>
                    <td class="text-light pl-3">By: {{ $p->last_post_by }} <br> On {{ $p->last_post_on }}</td>
                </tr>
            </tbody>
    @endforeach
    <form method='GET' action='{{ action('ForumController@getAddThread') }}'>
        <div class="d-flex border border-white border-bottom-0 flex-row-reverse bd-highlight" id="articleForum">
            <div class="p-2 bd-highlight"><button type="submit" class="btn btn-lg btn-outline-danger px-5 "
                    id="articleForum">New Topic</button></div>
        </div>
    </form>
    </table>
    <div class="d-flex border border-white pb-3 bd-highlight justify-content-center" id="articleForum"
        style="height: 40px">
        <div class="text-danger">
        {{ $posts->links() }}
        </div>
    </div>
@endsection
