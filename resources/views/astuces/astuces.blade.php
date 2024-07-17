@extends('base')
@section('section','Toutes les astuces')
@section('titre','Astuces')

@section('contenus')
    <a  href="{{route('astuces.new')}}" class="bouto1 ">
        Publier une astuce
    </a>





     
@php
use Illuminate\Support\Str;
    setlocale(LC_TIME,'fr_FR.utf8');
                            \Carbon\Carbon::setLocale('fr');
                            
@endphp
<style>
    .ee{
        
    }
    .ee svg{
    height:190px;
    width:50px;

    }
    element.style {
    height: 70%;
    width: 25%;
    object-fit: cover;
    padding-left: 10px !important;
}
</style>

<div class="row mb-2 mt-5">

<form action="" method="get">
    
    <div class="row g-4">
        <div class="col-sm-3">
            <div class="form-floating mb-3">
                <input type="text"  name="titre" value="{{$input['titre']??''}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Titre d'un astuce</label>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-floating mb-3">
                <input type="text" name="contenus" value="{{$input['contenus'] ?? ''}}" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Par un contenus</label>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-floating">
                <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example" onchange="this.form.submit()" >
                    <option value=""> Selectionner une Catégorie</option>

                    @foreach ( $categories as $category )
                  <option @selected(old('category_id', $input['category_id']?? "")== $category->id) value="{{$category->id}}" >{{$category->titre}}</option>
                  
                  @endforeach

                </select>
                <label for="floatingSelect">Par une catégories</label>
              </div>
        </div>

        <div class="col-sm-3">
            <button class="btn btn-primary btn-lg">Rechercher</button>
        </div>
    </div>
    <hr>
</form>

    @forelse ($astuces as $astuce)
    @php
$titre= str_replace(' ','-',$astuce->slug)
@endphp
<style>
    .vv svg{
        height: 250px !important;
        width: 200px !important;
    }
</style>
        <div class="col-md-6">
            
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">

                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{$astuce->titre}}</strong>
                    <h3 class="mb-0"> <i class="bi bi-folder2-open">{{$astuce->category->titre}}</i></h3>
                    <div class="mb-1 text-muted">{{$astuce->created_at->formatLocalized(' %d %B %Y')}}
                    <p>Par :  {{$astuce->users->name}}</p></div>
                        <p class="card-text mb-auto">{{substr($astuce->contenus,0,200) }}</p>
                        <a href="{{route('astuces.shoastuce',['nom'=>$astuce->slug,'astuce'=>$astuce->id])}}" class="stretched-link">Lire la suite</a>
                    </div>
                <div class="col-auto d-none d-lg-block">
                    @if($astuce->image)
                    <img class="bd-placeholder-img" width="200" height="250" src="{{$astuce->imageUrlAstuce()}}" >
                    @else
                    @php
                        echo                     '<div class="ee vv" style="height:70% ; width: 25% ;  object-fit: cover; padding:10px!important   ">' .
                            $astuce->category->svg . '</div>'
                    @endphp
                    <!--svg class="bd-placeholder-img" width="200" height="250"  role="img" aria-label="Placeholder: Pas d'illustration" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Pas d'illustration</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Pas d'illustration</text></svg-->
@endif
        
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-danger">
            Aucunne publication ne correspond à votre recherche
        </div>


    @endforelse
    
      </div>
      {{$astuces->links()}}
<hr>
<h3>Trier les catégories</h3>
    <div class="row g-4 py-5 ml-5 row-cols-1 row-cols-lg-3">
        
@foreach ($categories as $category )
<div class="col-md-6">
<div class="d-flex position-relative py-3  border border-{{$category->couleur}}  " style="border-radius:12px ; margin-right:20px !important " >
    @if ($category->image)
    <img src="{{$category->imageUrlcat()}}"  style="height:70% ; width: 25% ;  object-fit: cover;   ; padding-left:10px !important"  class="flex-shrink-0 me-3" alt="...">
        
    @else
    @php
        echo(
            '<div class="ee" style="height:70% ; width: 25% ;  object-fit: cover; padding:10px!important   ">' .
            $category->svg . '</div>'
            
            )
    @endphp
        <!--img src="{{asset('grace2.png')}}"  style="height:70% ; width: 25% ;  object-fit: cover;   ; padding-left:10px !important"  class="flex-shrink-0 me-3" alt="..."-->
    @endif
    <div class="caqrd" style="min-width: 0px"  >
      <h5 class="mt-0">{{$category->titre}} </h5>
      <p style="min-width: 0px" >{{substr($category->description,0,200)}} ... </p>
      <a href="{{route('astuces',['category_id' => $category->id])}}" class=" stretched-link" style="text-decoration: none" >Cliqué pour lire la suite</a>
    </div>
  </div>
     
</div>


  @endforeach
</div>

@endsection