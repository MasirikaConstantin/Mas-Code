@extends('admin.base')
@section('section','Admin site')
@section('titre', 'AdminBase')
@section('contenus')
@php
  $count1=0;
  $count=0;
@endphp
@if (session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>  
@endif
<h3>Categories</h3>
<a  class="btn btn-link" href="{{route('admin.adminastuce')}}">Les astuces</a>
<ul class="nav col-md justify-content-end">
  @foreach ($category as $cat )
  @php
    $count1++;
  @endphp
  <li class="nav-item me-2 mt-2 "> <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count1}}" >{{$cat->titre}} </button>    </li>


<div class="modal fade" id="exampleModal{{$count1}}"   tabindex="-1" aria-labelledby="exampleModalLabel{{$count1}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <div class="card-group">
          <!--p style="color: red; font-weight: 500" >
          Voulez-vous vraiment supprimer cette categorie?  
          </p-->
          <div class="carsd">
            <p>Titre :  <strong>{{$cat->titre}}</strong></p>
            <p>Description : <strong>{{$cat->description}}</strong></p>

              Date de publication : <strong>{{$cat->created_at->formatLocalized(' %d %B %Y')}}</strong>
              @if($cat->created_at != $cat->updated_at)
              <p>Modifé le : <strong> {{$cat->updated_at->formatLocalized(' %d %B %Y')}}</strong></p>

            
            @endif
            @if ($cat->image)
            <div class="col-lg-4">
              <a class="test-popup-link " href="{{$cat->imageUrlcat()}}">
                <button class="btn" data-bs-dismiss="modal"><img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="{{$cat->titre}}" width="140" height="140" src="{{$cat->imageUrlcat()}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
                </button>
              </a>
              
            </div>
            @endif
            
            <div>
              <a class="btn btn-outline-primary me-4" href="{{route("admin.editcat",['id'=>$cat->id])}}">Editer</a>
              <a class="btn btn-outline-danger" href="{{route("admin.deletecat",['id'=>$cat->id])}}">Supprimer</a>

            </div>

          </div>
          
        </div>


      </div>
      
    </div>
  </div>
</div>
  @endforeach
  <li class="nav-item me-2 mt-2"> <a  class="btn btn-outline-primary" href="{{route("admin.newcat")}}">Créer une category</a>    </li>

</ul>

<hr class="my-4">





<h3>Tags</h3>


<ul class="nav col-md justify-content-end">
  @foreach ($tags as $tag )
  @php
    $count++;
  @endphp
  <li class="nav-item me-2 mt-2"> <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$count}}{{$tag->id}}" >{{$tag->nom}} </button>    </li>


<div class="modal fade" id="exampleModal{{$count}}{{$tag->id}}"   tabindex="-1" aria-labelledby="exampleModalLabel{{$count}}{{$tag->id}}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


        <div class="card-group">
          <!--p style="color: red; font-weight: 500" >
          Voulez-vous vraiment supprimer cette categorie?  
          </p-->
          <div class="carsd">
            <p>Titre :  <strong>{{$tag->nom}}</strong></p>
            <p>Couleur :
              <span class="badge bg-{{!is_null($tag->couleur) ? $tag->couleur : 'white'}} ">
              {{$tag->nom}} 
          </span>

        </p>

              Date de publication : <strong>{{$tag->created_at->formatLocalized(' %d %B %Y')}}</strong>
              @if($tag->created_at != $tag->updated_at)
              <p>Modifé le : <strong> {{$tag->updated_at->formatLocalized(' %d %B %Y')}}</strong></p>

            
            @endif
            @if ($tag->image)
          
            @endif
            
            <div>
              <a class="btn btn-outline-primary me-4" href="{{route("admin.edittag",['id'=>$tag->id])}}">Editer</a>

            </div>

          </div>
          
        </div>


      </div>
      
    </div>
  </div>
</div>
  @endforeach
  <li class="nav-item me-2 mt-2 "> <a  class="btn btn-outline-primary" href="{{route("admin.newtag")}}">Créer un Tag</a>    </li>

</ul>

<hr class="my-4">

    
{{Auth::user()->name}}





















<div class="album py-5 bg-body-tertiary">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <div class="col">
      
        <div class="card border-light mb-3" style="max-width: 12rem;">
          <div class="card-header">Nombre de posts</div>
          <div class="card-body">
            <div class="stats-item d-flex align-items-center text-center">
              <h1 data-purecounter-start="0" data-purecounter-end='{{$posts->count()}}' data-purecounter-duration="1" class="purecounter text-center"></h1>
            </div>
          </div>
        </div>

      </div>
      
      
    </div>
  </div>
</div>



<script src="{{asset('purecounter_vanilla.js')}}"></script>
<script>
    new PureCounter();
</script>

<div class="mt-3">
<h3>Les utilisateurs</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Date</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $item)
        <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->created_at->formatLocalized(' %d %B %Y')}}</td>
      <td>{{$item->email}}</td>
      <td>
        @if ($item->image!=null)
      <a class="test-popup-link " href="{{$item->imageUrls()}}">
        <img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="{{$item->name}}" width="80" height="80" src="{{$item->imageUrls()}}" style="object-fit: cover" />

      </a>
        
      @else
      <img class="bd-placeholder-img rounded-circle" width="80" height="80" src="{{asset('téléchargement.png')}}" />
      @endif
      </td>

    </tr>
    @endforeach
  
    
  </tbody>
</table>
</div>

@endsection