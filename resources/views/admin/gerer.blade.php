@extends('admin.base')
@section('section','Admin Astuce')
@section('titre', 'Admin Astuce')
@section('contenus')




@php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
@endphp
@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

@endphp
<style>
      .mes{
        display: inline-block;
    
    color: #000;
    vertical-align: middle;
    
    border-radius: 5px;
    font-weight: bolder;
    overflow: hidden;
      }
  .mes svg{
    width: auto;
    height: 60px;
  }
  @media (max-width: 500px){
        
        .mes{
        display: inline-block;
    
    color: #000;
    vertical-align: middle;
    
    border: 3px solid #0e0c0cc4;
    border-radius: 5px;
    font-weight: bolder;
    overflow: hidden;
      }
  .mes svg{
    width: auto;
    height: 100px;
  }}
</style>

<div class="row g-5" >





    <div class="col-md-12 col-lg-8" >
    




        <div class=" mb-4  py-3" style="text-align: justify">

            <div class="container mb-4 vw-100">
                <!--iframe src="https://www.youtube.com/embed/HUHL2f3EpHY?si=X5MbA0Vy-LSQNost" title="YouTube video" allowfullscreen></iframe-->
                @if($astuce->video)
                <iframe width="560"  height="315" src="{{$astuce->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                @elseif($astuce->image)
                    <div class="col-sm-6 mb-3 mb-sm-0" style="overflow: hidden;" >
                <img src="{{$astuce->imageUrlAstuce()}}" class="img-fluid rounded mx-auto d-block" width="100%"  height="auto" alt="">
                
                    </div>
                @endif
            </div>
            <!--iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/HUHL2f3EpHY?si=JIUVrz6B3VS2msFM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe-->
            
            @php
                echo $astuce->contenus
            @endphp
            <div class="card py-3 me-3 container">
                <p>
                  Categorie : <strong>{{$astuce->category->titre}}</strong>

                </p>
                <p>
                    Tags :

                    @foreach ($astuce->tags as $tag)
                        <span class="badge bg-{{$tag->couleur}} warning ">
                            {{$tag->nom}}
                        </span>
                    @endforeach
                </p>
                @if ($astuce->video)
                <p>
                    Lien : {{$astuce->video}}
                </p>
                @endif
            </div>
        </div>


    </div>


    
    <div class="col-md-5 col-lg-4 ">
    
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-body"><strong>Action</strong> </span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <p class="my-0"><strong>Etat</strong></p>
            
                      
                    <small class="text-muted"> {{$astuce->etat==1 ? 'Astuce accepté' :'En attente de votre validation'}}</small>

                 
                </div>
                <span class="badge {{$astuce->etat==1 ? 'bg-success' :'bg-warning'}} text-center py-3">{{$astuce->etat==1 ? 'Posté' :'En attente'}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <p>Mise à jour il y a :   <strong>{{$maduree}}</strong> </p>

              </li>

        </ul>
        @if ($astuce->etat==0)
            <div class="alert alert-success">
                <strong class="me-3" >Action</strong>
                <a href="{{route('admin.gereredit',['astuce'=>$astuce->id, 'donnee'=>1])}}" class="btn btn-primary"> Mettre en ligne</a>
            </div>
        @else
        <div class="alert alert-danger ">
            <strong class="me-5" >Action</strong>
            
            <a href="{{route('admin.gereredit',['astuce'=>$astuce->id,'donnee'=>0])}}" class="btn btn-primary end-0">Mettre en attente</a>
        </div>
            
        @endif
        @if (session('success'))
<div class="alert alert-success">
  {{session('success')}}
</div>  
@endif
        
    </div>







</div>
        
          
</div>

</div>

  </div>

  


@endsection