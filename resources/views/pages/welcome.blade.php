@extends('layouts.app')
@section('title', "Welcome")
   @section('content')
   <div class="d-flex justify-content-center">
            <h1 class="page-header text-danger fancyText">Memes Casino</h1>
        </div>
            <blockquote class="blockquote">
                <p class="mb-0 text-light">"<b class="text-danger">Love</b> is thrash.<br></p>
                <p class="mb-0 pl-3 text-light"><b class="text-danger">Bitches</b> need cash."</p>
                <footer class="blockquote-footer">Mahatma Gandhi <cite title="Source Title">(1869-1948)</cite></footer>
            </blockquote>
  @endsection
  @section('home')
  <img class="d-block w-100" src="pictures/smoke.gif" alt="">
  @endsection