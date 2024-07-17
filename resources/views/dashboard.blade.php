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

@endphp

<style>
  @media (max-width: 500px){
      th{
          padding-bottom:0px !important  ;
        font-size: 12px;

      }
      th .h4{
        font-size: 22px;
      }
      th p{
        font-size: 12px;
      }
      .s{

      margin: .15rem !important;
      font-size: .8rem !important;
    
      }
      *, ::after, ::before {
     box-sizing:inherit !important; 
}
            }
</style>
<div class="row g-4 py-5 row-cols-1 row-cols-lg-2" >
  <div class="col-lg-4 ">
    <div class="col-lg-4">
      
      @if (Auth::user()->image!=null)
      <a class="test-popup-link " href="{{$user->imageUrls()}}">
        <img class="bd-placeholder-img rounded-circle" data-fancybox data-caption="{{$user->name}}" width="140" height="140" src="{{$user->imageUrls()}}" style="object-fit: cover" />

      </a>
        
      @else
      <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{asset('téléchargement.png')}}" />
      @endif
    </div>
    @auth
    
  @if(Auth::user()==$user)
  @else
      @if ($ubs->count() > 0)
      <span class="badge bg-success">Abonné</span>
        <p class="mt-2">
          <a href="{{route('user.unsubscribe',['user'=>$user])}}" class="btn btn-outline-primary btn-sm" > Se désabonner</a>
        </p>
        
      @else
      <p class="mt-2 py-3" >
        <a href="{{route('user.subscribe',['user'=>$user])}}" class="btn btn-primary" > S'abonner</a>
      </p>
      @endif
@endif
    @endauth
@guest
  <div class="alert alert-warning mt-2">
    <a href="{{route('login')}}">Connectez vous</a> ou <a href="{{route('register')}}">créer un compte</a> pour s'abonner   
  </div>
@endguest

    <hr>


  <ul class="nav flex-column">
    <li class="nav-item"> Nom: <strong>{{$user->name}}</strong> </li>
    <li class="nav-item"> Adresse mail: <strong>{{$user->email}}</strong> </li>
    <li class="nav-item"> Nombre d'abonné: <strong>{{$user->subscribers()->count()}}</strong> </li>
    <li class="nav-item"> Nombre des posts: <strong>{{$user->posts()->count()}}</strong> </li>
    <li class="nav-item"> Nombre des commentaires: <a href="{{ route('user.comments', $user) }}"><strong>{{$user->com()->count()}}</strong> </a></li>
    
    
    
    <li class="nav-item"> <a href="{{route('profile.edit')}}"> Modifier mes informations </a></li>
    <li class="nav-item">
      
    
      <div class="dropdown bg-body text-body mt-2">
        <button class="btn btnhover dropdown-toggle text-body" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <strong>Créer</strong>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="{{route('astuces.new')}}"> Astuce</a></li>
          <li><a class="dropdown-item" href="{{route('user.newpost')}}"> <i class="bi bi-patch-question"></i>  Post </a></li>
        </ul>
      </div>
    
    </li>



    
  </ul>

  </div>
<div class="col-lg-6">

  <a class="bouto1"  href="?demande">Brouillon</a>
  <a class="bouto1"  href="?demande=q">Mes Questions</a>
  <a class="bouto1" href="?demande=a">Mes Astuces</a>


  @if (request('demande')=="q")
    

        
    @foreach ($posts as  $post)
    @php
    $titre= str_replace(' ','-',$post->slug);

    @endphp
        <div class="py-2 mt-3 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6   p-3 bg-body border rounded-3 position-relative">
                <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                      <form method="POST" action="{{ route('user.posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    
                            <div class="row">
                              <div class="col-sm-4">
                              <div class="form-check form-switch mt-2">
                                <input type="hidden" name="etat" value="0">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="etat" value="1" {{$post->etat == 1 ? "checked" : ""}}>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Masqué</label>
                            </div>
                              </div>
                    <div class="col-sm-4 mb-2">
                      <button class="btn btn-outline-primary" type="submit">Mettre à jour</button>

                    </div>
                            </div>
                         
                        
                    </form>
                        <ul class="list-group" >
                            <li class="list-group-item" >
                              
                              <strong>{{$post->titre}}</strong>  <p><a href="{{route('user.modif',['post'=>$post->id])}}">Modifier</a>

                              </p> </li>
                            <li class="list-group-item" >
                              @if ($post->created_at != $post->updated_at)
                              <p>
                                <i class="bi bi-exclamation-triangle"></i>  <span class="badge bg-secondary" > Modifier le: {{$post->updated_at->formatLocalized(' %d %B %Y')}} à {{$post->updated_at->format(' H : i')}} </span>
                              </p>
                                
                              @endif
                                {{$post->contenus}}
                          

                            </li class="list-group-item" >
                            @if ($post->codesource)
                                    <pre style="" class="border border-5  " ><code class="b @if($post->categorie_id==1)language-csv @elseif($post->categorie_id==2)language-css @elseif($post->categorie_id==3)language-php @elseif($post->categorie_id==4)language-javascript @elseif($post->categorie_id==5)language-python @elseif($post->categorie_id==6)language-java @endif">{{($post->codesource)}}</code></pre>
                            @endif
                        
                          
                            @if ($post->image)
                            <li class="list-group-item"> <img src="{{$post->imageUrl()}}" style="height:220px ; width: 100% ; height: 300px; object-fit: cover " alt="" srcset=""></li>
                                
                            @endif
                          <li class="list-group-item" >

                            <p class="small" > 
                                @if ($post->category)

                                Categorie : 
                                <strong>
                                {{$post->category ?->titre}}

                                </strong>
                                @endif
                                <br> 
                                @if (!$post->tags->isEmpty())
                                    Tags : 
                                @foreach ($post->tags as $tag)
                                    <span class="badge bg-{{$tag->couleur}}">
                                        {{$tag->nom}} 
                                    </span>
                                @endforeach
                                @endif
                              
                            <p class="text-muted" >Publié le   : {{$post->updated_at->formatLocalized(' %d %B %Y');}} </p>
                              
                            <p class="text-muted" >Créer par  : {{$post->users->name}} </p>
                              
                                <a href="{{route('user.show',['nom'=>Str::lower($titre),'post'=>$post])}}" class="icon-link gap-1 icon-link-hover stretched-link" >Lire la suite</a>
                            </p> 
                           
                      <p><small> {{ $post->views_count }}   @if($post->views_count>1)vues @else vue @endif</small></p>
                    </li>


                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>

     



        @endforeach


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  {{$posts->appends(Request::except('page'))->links()}}
            
        </div>
        </div>
    </div>


  @elseif(request('demande')=="a")
    
      @forelse ($astuces as $astuce)
      <div class="py-2 mt-3 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6   p-3 bg-body border border-3 rounded-3 position-relative">
            <div class="bg-body  overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900  "  style="text-align: justify">
                  @php
                      echo $astuce->contenus
                    @endphp
                </div>
                
              </div>
              <div class="border border-2 rounder-2 p-2">
                @if ($astuce->etat == false)
                  <div class="alert alert-warning">
                    Vous êtes le seul et les administrateur à voir cette astuce avant sa validation par les administrateurs
                    <div class="spinner-border spinner-border-sm" role="status">
                      
                    </div>
                    
                  </div>
                @endif
                <a class=" stretched-link" href="{{route('astuces.mesastuces',['nom'=>$astuce->slug,'astuce'=>$astuce->id])}}">modifier</a>

                </div>
          </div>
      </div>


      @empty
          <div class="alert alert-danger mt-2">
              Aucune astuces pour l'instant
          </div>
      @endforelse
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
          <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                {{$astuces->appends(Request::except('page'))->links()}}
              </div>
          </div>
        </div>
  @elseif(request('demande')=='')
          <div class="shadow-lg p-3 mb-5 bg-body  mt-3 border border-info border-3 rounded-3">
            <div class="">
            

            <table class="table table-striped table-hover border">
              <thead>
                <tr>
                  <th scope="col" style="padding-bottom:20px !important ">Sujet</th>
                  <th scope="col" style="padding-bottom:20px !important ">Etat</th>
                  <th scope="col" style="padding-bottom:20px !important ">Visites</th>
                  
                </tr>
              </thead>
              <tbody>
                  
                @forelse ($postsbruillon as $post )
                @if ($post->etat == 1)
                  
                    <tr>
                      <th scope="row">
                      <div style="position: relative" >
                        <p class="h4" >
                          {{ $post->titre}}
                        </p>
                        <p>
                          Réactions
                          <i class="bi bi-hand-thumbs-up s"></i> {{$post->reactions()->where('reaction', '1')->count()   }} & <i class="bi bi-hand-thumbs-down s"></i> {{$post->reactions()->where('reaction', '0')->count()}}
                        </p>
                        <p class="text-muted" >
                          <i class="bi bi-clock-history s"></i> Mise à jour il y a  : {{ $post->duree}}
                        </p>



                        
                        <a class="btn  shadow-lg p-1 bg-body me-2 " href="{{route('user.modif',['post'=>$post->id])}}">
                          <i class="bi bi-pencil-square me-2"></i> <strong> Editer</strong>
                        </a>
                        <a class="btn  shadow-lg p-1 bg-body" style="border: 1px rgb(136, 94, 94) solid" href="{{route('user.show',['nom'=>$post->slug,'post'=>$post])}}">
                          <i class="bi bi-eye  me-1 " style="margin-left: 12px !important " ></i>  <strong>Voir</strong>
                        </a>
                      </div>
                      </th>
                      <td>
                        @if ($post->etat== false)
                        <span class="badge bg-success" >Publié</span>
                        @elseif($post->etat ==true)
                        <span class="badge bg-warning" >Non Publié</span>
                        @endif
                      </td>
                      <td> <i class="bi bi-eye s"></i> {{$post->views_count}} </td>
                    </tr>
                @endif
                    
                @empty
                <div class="alert alert-danger">
                  Aucune astuces pour l'instant
              </div>
                @endforelse

              
              </tbody>
            </table>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
              <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                    {{$postsbruillon->appends(Request::except('page'))->links()}}
              
                </div>
                </div>
            </div>

                </div>


              </div>
  @endif


</div>

</div>

  </div>

@endsection