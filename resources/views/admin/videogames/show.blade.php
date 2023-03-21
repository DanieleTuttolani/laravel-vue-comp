@extends("layouts.app")
@section("title","Videogames")

@section ("content")
<div class="my-show">
    <div class="container">

    <div>
       <div class="my-img-show float-start me-4">
           <img class="img-fluid" src="{{asset($videogame->image)}}" alt="" >
       </div>
    <h1 >
       {{$videogame->title}}
   </h1>
   <p>
    {{$videogame->description}}
   </p>
   <p >
      Il prezzo è di {{$videogame->price}} euro
   </p>
   @if ($videogame->available)
   <p>Questo gioco è attualmente disponibile</p>
   @else
   <p>Questo gioco non è attualmente disponibile</p>
   @endif
</div>

@endsection