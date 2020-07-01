@extends('layouts.app')
@section('title', "Forum")
 @section('content')
 <header class="border-bottom mb-2 px-2 rounded" id="articleForum">
     <div class="d-flex p-1 bd-highlight">
         <h5 class="text-2xl text-light"><strong class="text-danger">Edit Profile - {{ $user->name }}</strong></h5>
     </div>
 </header>
 <div class='border'>
    @if ($errors->any())
    <div class="alert-danger" style="background-color: black">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <form method="POST" action="/profile/{{$user->id}}/edit" enctype="multipart/form-data">
         @csrf
     <div class="position-absolute p-3">
        <img src="{{$user->profile->avatarImage()}}" class="rounded-circle ">
        <input type="file" class="form-control-file pt-3 text-danger" id="avatar" name="avatar">
     </div>
     <div class="offset-md-3 mb-4 ">
         <div class="">
             <div class="col-12">
                 <div class="d-flex pt-2 mx-auto bd-highlight">
                     <label class="text-danger ">Username:</label>
                     <div class="input-group input-group-sm ml-1">
                         <input type="text" class="form-control" aria-label="Sizing example input" name="username"
                             value="{{old('username') ??  $user->name }}" disable aria-describedby="inputGroup-sizing-sm">
                     </div>
                 </div>
             </div>
         </div>
         <div class="d-flex pr-3 mt-3 bd-highlight">
             <textarea class="form-control form-group-sm" name="content"
                 rows="5">{{old('username') ?? $user->profile->description }}</textarea>
         </div>
         <div class="d-flex pt-2 bd-highlight">
             <button type="submit" class="btn btn-lg btn-outline-danger px-5" id="articleForum">Save Profile</button>
         </div>
     </div>
    </form>
 </div>
 @endsection