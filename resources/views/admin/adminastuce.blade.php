@extends('admin.base')
@section('section','Admin Astuce')
@section('titre', 'Admin Astuce')
@section('contenus')
<p>Les plus recents</p>
<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">


    @forelse ($astuces as $astuce )
        <div class="col mt-2">
            <div class="card text-center">
                <div class="card-header">
                {{$astuce->titre}} <span class="badge {{$astuce->etat==1 ? 'bg-success' :'bg-warning'}} text-center ">{{$astuce->etat==1 ? 'Posté' :'En attente'}}</span>
                </div>
                <div class="card-body">
                <h5 class="card-title"><strong>{{$astuce->users->name}}</strong></h5>
                <p class="card-text">{{$astuce->description}}</p>
                <a href="{{route('admin.gerer',['id'=>$astuce])}}" class="btn btn-primary">Administrer</a>
                </div>
                <div class="card-footer text-muted">
                2 days ago
                </div>
            </div>
        </div>
        
    @empty
        <div class="alert alert-success">
            <p>Aucune astuce en attente</p>
        </div>
    @endforelse

  </div>

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
    <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
{{$astuces->links()}}
    
</div>
</div>

<hr class="my-4" >
@endsection