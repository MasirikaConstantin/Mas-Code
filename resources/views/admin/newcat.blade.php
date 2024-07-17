@extends('admin.base')
@section('section',$category->exists ? 'Editer une  Categorie' :'Créer une Categorie')
@section('titre', $category->exists ? 'Editer une Categorie' :'Créer une Categorie')
@section('contenus')


  <form action="{{route($category->exists ? 'admin.editcat': 'admin.newcat', $category)}}" method="post" enctype="multipart/form-data" >
    @csrf
  
    <div class="form-floating mb-3">
      <input type="text" name="titre" class="form-control" id="floatingInput" value="{{old('titre',$category->titre)}}" >
      <label for="floatingInput">Titre</label>
      @error('titre')
        <div class="alert alert-danger mt-2">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-floating mt-2 ">
      <select @selected(old($category->couleur)) class="form-select" name="couleur" id="floatingSelect" aria-label="Floating label select example">
        <option  @selected(old('couleur', $category->couleur)) value="primary" >Bleu</option>
        <option  @selected(old('couleur', $category->couleur)) value="light">Blanche</option>
        <option  @selected(old('couleur', $category->couleur)) value="secondary">Gris</option>
        <option  @selected(old('couleur', $category->couleur)) value="success">Verte</option>
        <option  @selected(old('couleur', $category->couleur)) value="info">Blue claire</option>
        <option  @selected(old('couleur', $category->couleur)) value="warning">Jaune</option>
        <option  @selected(old('couleur', $category->couleur)) value="danger">Rouge</option>
        <option  @selected(old('couleur', $category->couleur)) value="dark">Noire</option>

      </select>
      <label for="floatingSelect">Selectionner une couleur</label>
    </div>
    @error('couleur')
        <div class="alert alert-danger mt-2">
            {{$message}}
        </div>
    @enderror


    <div class="row align-items-md-stretch mb-3">
      <div class="col-md-6">
          <label for="validationDefault03" class="form-label">Photo(si possible)</label>
          <input type="file" name="image" class="form-control"  id='fileUpload'/>
      </div>
      <div class="col-md-6 img-c" >
          <img id='imageDiv' class="h-s100" style="width: 320px; height: 200px;"  />
      </div>
      @error('image')
        <div class="alert alert-danger mt-2">
            {{$message}}
        </div>
    @enderror

    <div class="col-md-12">
      <label for="validationDefault03" class="form-label">Code Svg(si possible)</label>
      <input type="text" name="svg" class="form-control"  id='fileUpload'/>
  </div>

    
  </div>

    <div class="form-floating  mt-3">
      <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
        {{old('description',$category->description)}}
    </textarea>
      <label for="floatingTextarea2">Description</label>

      @error('description')
        <div class="alert alert-danger mt-2">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-check form-switch mt-2">
      <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" {{$category->status == 1 ? "checked" : ""}}  >
      <label class="form-check-label" for="flexSwitchCheckChecked">Masqué</label>
    </div>
@error('status')
  {{$message}}
@enderror

    <div class="col-auto mt-3">
      <button type="submit"  class="btn btn-primary mb-3">
        @if ($category->exists)
          Modifier
        @else
          Ajouter
        @endif
      </button>
    </div>
  </form>
    
<script>
  document.getElementById('fileUpload').addEventListener('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
          document.getElementById('imageDiv').src = e.target.result;
      }
      reader.readAsDataURL(this.files[0]);
  });
  </script>
  <script>
  document.getElementById('fileUpload').addEventListener('change', function() {
      var reader = new FileReader();
      reader.onload = function(e) {
          var img = document.createElement('img');
          img.src = e.target.result;
          document.getElementById('imageDiv').appendChild(img);
      }
      reader.readAsDataURL(this.files[0]);
  });
  </script>

@endsection