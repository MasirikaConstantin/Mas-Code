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
    




        <div class=" mb-4  py-3" style="text-align: justifys">

            <div class="container mb-4">
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
                <p>Mise à jour il y a :   <strong>{{$maduree}}</strong> </p>
                @if ($astuce->video)
                <p>
                    Lien : {{$astuce->video}}
                </p>
                @endif

                <p>
                  Auteur : 

                 
                    @if($astuce->users->image)
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <img src="{{$astuce->users->imageUrls()}}" alt="mdo" width="50" height="50" class="rounded-circle">
                    </button>
                    
                    @else
                    <a href="#" class="btn" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-person-circle s"></i>
                    </a>
                    @endif
                  </a>
                  <strong>{{$astuce->users->name}}</strong>

                </p>
                
            </div>
        </div>


    </div>


    
    <div class="col-md-5 col-lg-4 ">
    
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-body">Autres astuces du genre</span>
        </h4>
        <ul class="list-group mb-3">
        

        @forelse ($ast1 as $t )
        <li class="list-group mt-3  d-flex justify-content-between lh-sm" style="position: relative ; text-align: justify" >
      
        <a href="{{route('astuces.shoastuce',['nom'=>$t->slug,'astuce'=>$t->id])}}" class=" mes d-flex align-items-center stretched-link mb-3 mb-md-0 me-md-auto text- text-decoration-none text-primary">
          @php
                    print $astuce->category->svg
                  @endphp

          <span class="fs-4 ">{{$t->titre}}</span>

          </a>
          {{Str::limit($astuce->description,150)}}
        <hr>
          </li>

        <!--li class="list-group mt-3  d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"> {{$t->titre}} </h6>
              <small class="text-muted">Brief description</small>
            </div>
                <div class="mes bg-body" >
                    @php
                    echo $astuce->category->svg
                  @endphp
                </div>
            <hr>
          </li-->

          
        @empty
        @foreach ($ast2 as $d )
        <li class="list-group mt-3  d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0"> {{$d->titre}} </h6>
            <small class="text-muted">Brief description</small>
          </div>
              <div class="mes bg-body" >
                  @php
                  echo $d->category->svg
                @endphp
              </div>
          <hr>
        </li>
        @endforeach
        
        @endforelse


        </ul>



        
    </div>







</div>
        
          
</div>

</div>

  </div>















  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
  
  
  
  
  
          <div class="card-group">
            <div class="carbd">
              @if($astuce->users->image)
  
  
              <a class="test-popup-link " href="{{$astuce->users->imageUrls()}}">
                <button class="btn" data-bs-dismiss="modal">
  
              <img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="{{$astuce->users->name}}" width="140" height="140" src="{{$astuce->users->imageUrls()}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
  
                </button>
              </a>
  
  
              
              @else
  
              <img src="{{asset('téléchargement.png')}}" alt="mdo" width="50" height="50" class="rounded-circle">
                @endif    
            </div>
            <div class="carvd">
                Nom : <strong>{{$astuce->users->name}}</strong>
                <p>Nous a rejoins le : <strong> {{$astuce->users->created_at->formatLocalized(' %d %B %Y')}}</strong></p>
                
                <p>
                  <small>Nombre d'abonné : {{$astuce->users->subscribers()->count()}}</small>
                </p>
                <p>
                  <a class="bouto1 text-body" href="{{route('user.profil', ['user'=>$astuce->users,"nom"=>(Str::slug($astuce->users->name,'-'))])}}">Voir le profil</a>
                </p>
            </div>
            
          </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
        </div>
    
      </div>
    </div>
  </div>
  
  
@endsection