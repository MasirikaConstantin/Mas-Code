@extends('base')
@section('titre', Str::substr($astuce->titre,0,20))
@section('section',($astuce->titre))
@section('contenus')
    



@php
$user=Auth::user();
date_default_timezone_set('Europe/Paris');
@endphp
@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

@endphp

        <div class="card mb-4 container py-3" style="overflow: hidden;">

  <div class="container mb-4 vw-100" style="overflow: hidden;" >
    <!--iframe src="https://www.youtube.com/embed/HUHL2f3EpHY?si=X5MbA0Vy-LSQNost" title="YouTube video" allowfullscreen></iframe-->
<!--iframe width="560" height="315" src="{{asset('Ouvrir et afficher les éléments d\'un fichier CSV, Gestion des fichiers en PHP CSV.mp4')}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe-->
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
                <a class="stretched-link " href="{{route('astuces.editastuce',['astuce'=>$astuce->id])}}">modifier</a>
    
                </div>
        </div>
          
</div>

</div>

  </div>

  
@endsection