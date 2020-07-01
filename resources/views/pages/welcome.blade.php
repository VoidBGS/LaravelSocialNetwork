@extends('layouts.app')
@section('title', "Welcome")
   @section('content')
            <h1 class="page-header text-danger"> Welcome to VK Fit!</h1>
            <blockquote class="blockquote">
                <p class="mb-0 text-light">"Where there is preparation, there is no fear."</p>
                <footer class="blockquote-footer">Hwang Lee <cite title="Source Title">(1914-2002)</cite></footer>
            </blockquote>
  @endsection
  @section('home')
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" src="pictures/lifting1.png" alt="First slide">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="pictures/lifting2.png" alt="Second slide">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="pictures/lifting3.png" alt="Third slide">
          </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
  @endsection