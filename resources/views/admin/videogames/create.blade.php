@extends("layouts.app")
@section("title","Create")
@section("content")
<div class="container">
    <div class="mt-5">
        <form action="{{route("admin.videogames.store")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title"  name="title" class="form-label">Titolo</label>
          <input type="text" class="form-control text-inputs" id="title" name="title" >
        </div>
        <div class="mb-3">
          <label for="price" name="price" class="form-label">Prezzo</label>
          <input type="number" step="0.01" class="form-control text-inputs" id="price" name="price" >

        </div>
        <div class="mb-3">
          <label for="description" name="description" class="form-label">Descrizione</label>
          <input type="text"  class="form-control text-inputs" id="description" name="description"  >

        </div>
        <div class="mb-3">
          <label for="image" name="image" class="form-label">immagine</label>
          <input type="url" class="form-control text-inputs" id="image" name="image"  >
        </div>
        <div class=" mt-4 d-flex align-items-center">
          <label for="available" name="available" class="form-label mb-0 me-3">Disponibilità</label>
          <input type="checkbox" class="my-check" id="available" name="available" value="1" >

        </div>
              <button class="btn btn-success mt-5">Invia</button>
        </form>
    </div>
   
</div>

@endsection