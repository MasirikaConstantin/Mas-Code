@extends('base')
@section('titre','Astuces')
@section('section',$astuce->exists ? 'Editer une  Astuce' :'Créer une Astuce')
@section('titre', $astuce->exists ? 'Editer une Astuce' :'Créer une Astuce')

@section('contenus')
<!--script src="https://cdn.tiny.cloud/1/f1tnskvlkm9je05ed34ptu28u2wxbcb7tmge4unq5og6v3l6/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script-->

			
			<section id="breadcrumb" class="py-3 fs-6" >
    <div class="container">
        <nav aria-label="breadcrumb " style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
            <ol class="breadcrumb mb-2 ">
                                                        <li class="breadcrumb-item"><a  class="text-body bouto2" href="/">Accueil</a></li>
                                                        <li class="breadcrumb-item"><a class="text-body bouto2" href="{{route('dashboard')}}">Profil</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">
                                                        <a class="btn border border-primary" style="margin: -10px 0; a::hover:background-color:  red " >Publier une astuce</a></li>
                                                </ol>
        </nav>
    </div>
</section>
		


<div class="p-3" >
		
	
		
		<div class="border shadow p-3 mb-2 bg-body rounded">

		<form action="{{route($astuce->exists ? 'astuces.editastuce': 'astuces.new', $astuce)}}"  method="post" enctype="multipart/form-data" >
                            @csrf
			
			<div class="row">

				<div class="col-md-8">

					<div class="form-group" >
						<label for="title" class="control-label"><strong>Titre</strong> </label>
						<input class="form-control @error('titre') is-invalid @enderror " value=" {{old('titre',$astuce->titre)}}" placeholder="Le titre de l'astuce"  name="titre" type="text"id="title">
						@error('titre')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror

						
					</div>
				</div>
				@error('slug')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror

						
				<div class="col-md-4">
					<div class="form-group">
						<label for="dossier_id "><strong>Catégorie</strong></label>
						
							@if ($astuce->exists)
							<select   class="form-select "   name="categorie_id">
								<option selected>Sélectionner une catégorie</option>
								@foreach ( $categories as $category )
								<option {{$category->id== $astuce->category->id ? 'selected': ''}}   value="{{$category->id}}">{{$category->titre}}</option>
									
								@endforeach
							</select>

							@else
							<select  class="form-select "   name="categorie_id">
								<option selected>Sélectionner une catégorie</option>
								@foreach ( $categories as $category )
								<option  @selected(old('categorie_id', $input['categorie_id']?? "")== $category->id) value="{{$category->id}}">{{$category->titre}}</option>
									
								@endforeach
							</select>

							@endif
							
						@error('categorie_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
					</div>
				</div>
				<div class="col-md-12 mt-3">
					<label for="control-label"><strong>Description</strong> <span class="text-danger" >*</span></label>
					<textarea class="form-control " rows="5" placeholder="Ajoutez du contenus pour faciliter la recherche"  name="description"  >
						{{old('contenus',$astuce->contenus)}}
					</textarea>
				</div>
				

<input type="text" name="etat" value="0" hidden >
			</div>
							
		
			<div class="form-group mt-2">
@php
	$value = $astuce->tags;
	//dd($value);
@endphp
				<label for="technologies_list" class="d-block"><strong>Tags maximum 4</strong></label>
				@if ($astuce->exists)
					@foreach ($tags as $tag)

					<div class="custom-control custom-checkbox d-inline-block bg-light me-2 mb-2 bg-body ">
						<input type="checkbox" name="tags[]" @checked($value->contains($tag->id)) value="{{$tag->id}}" class="form-check-input" id="flexCheckDefault"  >
						<label class="custom-control-label" for="flexCheckDefault"> {{$tag->nom}} </label>
					</div>
					@endforeach 	
				

					@foreach ($categories as $cat)
					<div class="custom-control form-check custom-checkbox d-inline-block bg-light me-2 mb-2 bg-body ">
						<input  type="checkbox" name="tags[]" value="{{$tag->id}}" class="form-check-input" id="flexCheckDefault"  >
						<label class="custom-control-label" for="flexCheckDefault"> {{$cat->titre}} </label>
					</div>
					@endforeach
					@error('tags')

						<div class="alert alert-danger mt-3">
							{{$message}}
						</div>
						@enderror
				@else
				@foreach ($tags as $tag)

					<div class="custom-control custom-checkbox d-inline-block bg-light me-2 mb-2 bg-body ">
						<input type="checkbox" name="tags[]" {{ is_array(old('tags'))&& in_array($tag->id, old('tags'))? 'checked':''}} value="{{$tag->id}}" class="form-check-input" id="flexCheckDefault"  >
						<label class="custom-control-label" for="flexCheckDefault"> {{$tag->nom}} </label>
					</div>
					@endforeach 	
					@foreach ($categories as $cat)
					<div class="custom-control form-check custom-checkbox d-inline-block bg-light me-2 mb-2 bg-body ">
						<input  type="checkbox" name="tags[]" value="{{$tag->id}}" class="form-check-input" id="flexCheckDefault"  >
						<label class="custom-control-label" for="flexCheckDefault"> {{$cat->titre}} </label>
					</div>
					@endforeach
					@error('tags')
						<div class="alert alert-danger mt-3">
							{{$message}}
						</div>
					@enderror
				@endif
<hr>

			</div>
<script>
	const chek= document.querySelectorAll('input[type="checkbox"]');

	chek.forEach(function (checkbox) {
		checkbox.addEventListener('change', function () {
			const nbr =document.querySelectorAll('input[type="checkbox"]:checked').length;
			if(nbr>5){
				checkbox.checked = false;
				alert('Vous ne pouvez sélectionner que 5 Tags')
			}
		})
		
	});
</script>


            <div class="form-group">
				<label for="catching" class="control-label"><strong>Contenus</strong> *</label>

				
				<textarea class="form-control " rows="15" placeholder="Ajoutez du contenus pour faciliter la recherche"  name="contenus" cols="50" id="tiny" >
					{{old('contenus',$astuce->contenus)}}
				</textarea>
                <small>
                    Avant de publier votre code s'il contient du code source veillez le prévisualiser
                </small>
				<div class="invalid-feedback">
				
				</div>
				<div class="">
						<small>
							Pour la <strong>surbrillance des codes sources</strong> utiliser cette exemple dans votre contenus
						</small>
					<pre style="" class="border border-1 language-html" tabindex="0" style="padding: 2px !important" ><code class="b language-html"><span class="token operator">&lt;</span>pre<span class="token operator"><span class="token operator">&gt;</span><span class="token operator">&lt;</span>code <span class="token keyword">class</span><span class="token operator">=</span><span class="token string double-quoted-string">"language-Nom_langage"</span><span class="token operator">&gt;</span>Votre Contenus <span class="token operator">&lt;</span><span class="token operator">/code<span class="token keyword"><span class="token operator">&gt;</span><span class="token operator">&lt;</span><span class="token operator">/</span>pre<span class="token operator">&gt;</span></code></pre>


					
				</div>
			</div>


            <input hidden type="number" value="{{Auth::user()->id}}" name="user_id"  >


<script>
            



						tinymce.init({
					selector : "textarea",
					menubar : false,
					plugins : 'codesample, code, image, link, lists, fullscreen, emoticons, wordcount, table',
					toolbar: 'undo redo | styles | bold italic underline | numlist bullist | table | image emoticons link codesample |  fullscreen wordcount',
					style_formats: [

					{ title: 'Headings', items: [
						{ title: 'Heading 2', format: 'h2' },
						{ title: 'Heading 3', format: 'h3' },
						{ title: 'Heading 4', format: 'h4' },
						{ title: 'Heading 5', format: 'h5' },
						{ title: 'Heading 6', format: 'h6' }
					]},

					{ title: 'Inline', items: [
						{ title: 'Bold', format: 'bold' },
						{ title: 'Italic', format: 'italic' },
						{ title: 'Underline', format: 'underline' },
						{ title: 'Strikethrough', format: 'strikethrough' },
						{ title: 'Superscript', format: 'superscript' },
						{ title: 'Subscript', format: 'subscript' },
						{ title: 'Code', format: 'code' }
					]},
					{ title: 'Blocks', items: [
						{ title: 'Paragraph', format: 'p' },
						{ title: 'Blockquote', format: 'blockquote' },
						{ title: 'Div', format: 'div' },
						{ title: 'Pre', format: 'pre' }
					]}
					],

					

				});

	
</script>

<div class="row align-items-md-stretch mb-3">
	<div class="col-md-6">
		<label for="validationDefault03" class="form-label">Photo(si possible)</label>
		<input type="file" name="image" class="form-control"  id='fileUpload'/>
	</div>
	@error('image')
					<div class="text-danger">
						{{$message}}
					</div>
				@enderror
	<div class="col-md-6 img-c" >
		<img id='imageDiv' class="h-s100" style="width: 320px; height: 200px;"  />
	</div>
</div>
			<div class="form-group mb-2" >
				<label for="video" class="form-label">Ajouter une vidéo Facultative</label>
				<input class="form-control @error('video') is-invalid @enderror" value="{{old('video', $astuce->video)}}" placeholder="https://www.youtube.com/watch?d=VEVERGTR" name="video" type="text" id="">
				@error('video')
					<div class="invalid-feedback">
						{{$message}}
					</div>
				@enderror
	

			</div>

			<div>
    <button type="submit" class="btn bouto1 text-body" >
        Publier
    </button>

</div>
			</form>
			
		</div>


			
	<!-- Supprimer le cours -->
		
		
</div>


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



</body>
</html>
@endsection