@extends('admin.base')
@section('section',$tag->exists ? 'Editer un Tag' :'Créer un Tag')
@section('titre', $tag->exists ? 'Editer un Tag' :'Créer un Tag')
@section('contenus')


  <form action="{{route($tag->exists ? 'admin.edittag': 'admin.newtag', $tag)}}" method="post" enctype="multipart/form-data" >
    @csrf
  
    <div class="form-floating mb-3">
      <input type="text" name="nom" class="form-control" id="floatingInput" value="{{old('nom',$tag->nom)}}" >
      <label for="floatingInput">Titre</label>
      @error('nom')
        <div class="alert alert-danger mt-2">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-floating mt-2 ">
      <select @selected(old($tag->couleur)) class="form-select" name="couleur" id="floatingSelect" aria-label="Floating label select example">
        <option  @selected($tag->couleur=='primary') value="primary" >Bleu</option>
        <option  @selected($tag->couleur=='light') value="light">Blanche</option>
        <option  @selected($tag->couleur=='secondary') value="secondary">Gris</option>
        <option  @selected($tag->couleur=='success') value="success">Verte</option>
        <option  @selected($tag->couleur=='info') value="info">Blue claire</option>
        <option  @selected($tag->couleur=='warning') value="warning">Jaune</option>
        <option  @selected($tag->couleur=='danger') value="danger">Rouge</option>
        <option  @selected($tag->couleur=='dark') value="dark">Noire</option>

      </select>
      <label for="floatingSelect">Selectionner une couleur</label>
    </div>
    @error('couleur')
        <div class="alert alert-danger mt-2">
            {{$message}}
        </div>
    @enderror



    <div class="form-check form-switch mt-2">
      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" {{$tag->status == 1 ? "checked" : ""}}  >
      <label class="form-check-label" for="flexSwitchCheckChecked">Masqué</label>
    </div>
@error('status')
  {{$message}}
@enderror

    <div class="col-auto mt-3">
      <button type="submit"  class="btn btn-primary mb-3">
        @if ($tag->exists)
          Modifier
        @else
          Ajouter
        @endif
      </button>
    </div>
  </form>


@endsection