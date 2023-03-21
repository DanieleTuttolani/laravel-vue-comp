
@extends('layouts.app')
@section('content')
<div class="bg-dark">
    {{-- brutto lo so ma non avevo di meglio --}}
    <div class="container py-5">
        {{-- intestazione --}}
        <div class=" bg-danger rounded p-3  text-light">
            @auth
            <h1>Applicazione Admin</h1>
            <p>Negozio di Videogiochi</p>
            <div class="text-center">
                <a href="{{route('admin.videogames.index')}}" class="btn btn-primary">Modificha il Catalogo</a>
            </div>
            @endauth
            @guest
            <h1>Negozio di Videogiochi</h1>            
            @endguest
        </div>

        <div class="row p-2">
            {{-- catalogo giochi disponibili --}}
            <div class="col-9 bg-danger rounded p-3 text-light">
                <div class="row m-0 p-0">
                    @foreach ($videogames as $videogame)
                        <div class="col my-card d-flex">
                            <div class="img-side">
                                @if($videogame->image)
                                <img src="{{$videogame->image}}" class="img-fluid rounded" alt="{{$videogame->title}} Poster">
                                @else
                                <img src="https://www.slntechnologies.com/wp-content/uploads/2017/08/ef3-placeholder-image.jpg" class="img-fluid rounded" alt="">
                                @endif
                            </div>
                            <div class="info-side bg-dark rounded">
                                <h2>Scopri</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{-- sezione newsletter --}}
            <div class="col bg-danger rounded p-3 text-light end">
                @guest
                <h3>Iscriviti alla NewsLetter</h3>
                <button> manca il link</button>
                @endguest
                @auth
                 <h4>Iscritti alla NewsLetter :</h4>   
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection