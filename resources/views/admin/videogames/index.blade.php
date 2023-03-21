@extends("layouts.app")
@section("title","Videogames")

@section ("content")
<main>
 
        <div class="container">
            <h1 data-text="Progetti" id="titolo" class="my-4">Videogame</h1>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <div>
                <a class="btn btn-small btn-success" href="{{route("admin.videogames.create")}}">Aggiungi <i class="fa-solid fa-plus"></i></a>
              </div>
              <div class="d-flex">
              </div>
            </div>
           
            <table class="table table-dark table-striped-columns table-index">
                <thead>
                    <tr>
                      <th class="my-th" scope="col">ID</th>
                      <th class="my-th" scope="col">Titolo</th>
                      <th class="my-th" scope="col">Prezzo</th>
                      <th class="my-th" scope="col">Disponibilità</th>
                      <th class="my-th" scope="col">Descrizione</th>
                      <th class="my-th" scope="col">Immagine</th>
                      <th class="my-th" scope="col">Azione</th>
                    </tr>
                  </thead>
                  <tbody>
                   @forelse ($videogames as $videogame)
                   <tr>
                    <th class="my-id" scope="row">{{$videogame->id}}</th>
                    <td id="titolos">{{ Str::limit($videogame->title, 20)}}</td>
                    <td>{{ $videogame->price}}</td>
                    @if($videogame->available==1) 
                    <td><i class="fa-solid fa-circle-check" style="color: #2dd421;"></i></td>
                @else
                <td><i class="fa-regular fa-circle-xmark" style="color: #c90808;"></i></td>
                @endif
                <td id="descriz">{{ Str::limit($videogame->description, 20)}}</td>

                    <td>{{ Str::limit($videogame->image, 20)}}</td>
                    
        
                    <td class="text-center">
                        <a href="{{route("admin.videogames.show", $videogame->id)}}" class="btn btn-small btn-primary"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{route("admin.videogames.edit", $videogame->id)}}" class="btn btn-small btn-warning"><i class="fa-solid fa-pen"></i></a>
                        <form class="delete-form d-inline" data-videogame="{{$videogame->title}}"  action="{{route("admin.videogames.destroy", $videogame->id)}}" method="POST">
                          @csrf
                          @method("DELETE")
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>
                          </button>
                        </form>
                    </td>
                   
                  </tr>
                   @empty
                    <tr>
                        <th scope="row" colspan="7" class="text-center">Non ci sono Progetti</th>
                    </tr>
                   @endforelse
                  </tbody>
            </table>
        </div>
     
</main>

@endsection
