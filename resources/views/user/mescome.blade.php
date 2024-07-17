@extends('base')

  @section('section',"Moi")
  @section('titre',"Mon Compte")
  
@section('contenus')

@php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
@endphp
@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');
use Illuminate\Support\Str;

@endphp





<div class="row row-cols-1 row-cols-md-3 g-4">
    

   @forelse ($comments as $comm )
   <!--div class="col">
    <div class="card h-100">
      <div  class="me-2" alt="...">
        <p>{{$comm->post->id}}</p>
      </div>
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
       
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div-->
  @php
  $titre= str_replace(' ','-',$comm->post->slug)
  @endphp
  <div class="d-flex text-muted pt-3">
    <div class=" bd-placeholder-img flex-shrink-0 me-2 rounded mes bg-body" >

    </div>
    <a href="{{route('user.show',['nom'=>Str::lower($titre),'post'=>$comm->post])}}"class="nav-link">
    <p class="pb-3 mb-0 small lh-sm border-bottom">
      <strong class="d-block text-body"> {{$comm->post->titre}} </strong>
      {{Str::limit($comm->contenus,150)}}
    </p>
  </a>
  </div>
   @empty
       
   @endforelse
  </div>
  {{$comments->links()}}

@endsection