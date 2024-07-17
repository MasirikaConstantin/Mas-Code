@extends('base')
@section('contenus')
@section('titre','Nouveau')
<main class="flex-shrink-0 mt-5 ">
    <div class="container mt-5">
        <hr>
        <h1>Poser une Question</h1> 
        
        <form  method="post" enctype="multipart/form-data"  >
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="titre" value="{{old('titre')}}"  class="form-control" id="floatingInput" >
                <label for="floatingInput">Titre *</label>
              </div>
              @error("titre")
              <div class="alert alert-danger">
                {{$message}}

              </div>
              @enderror
              @error("slug")
              <div class="alert alert-danger">
                {{$message}}

              </div>
              @enderror
              @auth
              @php
              $user=Auth::user()->id;
           @endphp
              
@php
$tagsId=$tags->pluck('id');
@endphp
            <input hidden type="text" value="{{Auth::user()->id}}" name="user_id"  >
            @endauth

            <select selected='{{old('categorie_id')}}' class="form-select mb-4" name="categorie_id"  aria-label="Default select example" required  >
                <option selected value="">
                    Sélectionner la catégorie
                </option>
                    @foreach ($categories as $l )
                        <option   value="{{$l->id}}">
                            {{$l->titre}}
                        </option>
                    @endforeach
            </select>
            @error("categorie_id")
              <div class="alert alert-danger">
                {{$message}}

              </div>
            @enderror
            
            <select selected='{{old('tag_id')}}' multiple class="form-select mb-4" name="tags[]"  aria-label="Default select example" required  >
                
                    @foreach ($tags as $ll )
                        <option   value="{{$ll->id}}">
                            {{$ll->nom}}
                        </option>
                    @endforeach
            </select>
            @error("tags")
              <div class="alert alert-danger">
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
            </div>
          <div class="row g-2">
            <div class="col-md-6 mb-3">
            
                <label for="exampleFormControlTextarea1" class="form-label">Votre Message</label>
                @error("contenus")
                <div class="alert alert-danger">
                  {{$message}}
  
                </div>
                @enderror
                <textarea class="form-control"  name="contenus"  id="exampleFormControlTextarea1" rows="10">
                        {{old('contenus')}}
                </textarea>

            </div>

            <div class="col-md-6 mb-3">
            
              <label for="exampleFormControlTextarea1" class="form-label">Code Source (si possible)</label>
              @error("codesource")
              <div class="alert alert-danger">
                {{$message}}

              </div>
              @enderror
              <textarea class="form-control"  name="codesource"  id="exampleFormControlTextarea1" rows="10">
                      {{old('codesource')}}
              </textarea>

          </div>
          </div>
<button class="btn btn-primary" type="submit" >Publier</button>
        </form>
    </div>
    

    <!--script src="https://cdn.tiny.cloud/1/f1tnskvlkm9je05ed34ptu28u2wxbcb7tmge4unq5og6v3l6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script-->




    <script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>

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
</main>

@endsection