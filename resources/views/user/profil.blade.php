@extends('base')

@if(Auth::user()==$user)

  @section('section',"Moi")
  
@else
  @section('section',$user->name)
@endif
@section('contenus')

@php
date_default_timezone_set('Europe/Paris');
@endphp
@php
setlocale(LC_TIME,'fr_FR.utf8');
\Carbon\Carbon::setLocale('fr');

@endphp
<div class="row g-4 py-5 row-cols-1 row-cols-lg-2" >
  <div class="col-lg-4 ">
    <div class="col-lg-4">
      
      @if ($user->image!=null)
      <a class="test-popup-link" href="{{$user->imageUrls()}}">
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
    <li class="nav-item"> Nombre des commentaires: <strong>{{$user->com()->count()}}</strong> </li>



    
  </ul>

  </div>
<div class="col-lg-6">




    
@foreach ($posts as  $post)
@php
$titre= str_replace(' ','-',$post->slug);

@endphp
    <div class="py-2 mt-3 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6   p-3 bg-body border rounded-3 position-relative">
            <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul class="list-group" >
                        <li class="list-group-item" >
                          
                           <strong>{{$post->titre}}</strong> </li>
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
                        <li class="list-group-item">
                          <a class="test-popup-link " href="{{$post->user->imageUrls()}}">

                           <img data-fancybox data-caption="{{$post->titre}}"  src="{{$post->imageUrl()}}" style="height:220px ; width: 100% ; height: 300px; object-fit: cover " alt="" srcset="">
                          </a>
                          </li>
                            
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
                                <span class="badge @if($tag->id==1)bg-warning @elseif($tag->id==2) bg-primary @elseif($tag->id==3) bg-danger @elseif($tag->id==4) bg-success @endif">
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















  
  <!-- Modal -->
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
            <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="{{$post->user->imageUrls()}}" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"/>
              
            </div>
            <div class="carvd">
                Nom : <strong>{{$post->user->name}}</strong>
                <p>Nous a rejoins le : <strong> {{$post->user->created_at->formatLocalized(' %d %B %Y')}}</strong></p>
                
                <p>
                  <small>Nombre d'abonné : {{$post->user->subscribers()->count()}}</small>
                </p>
                <p>
                  <a class="btn btn-link" href="{{route('user.profil', ['user'=>$post->user,"nom"=>(Str::slug($post->user->name,'-'))])}}">voir le profil</a>
                </p>

            </div>
            
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>



    @endforeach


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
        <div class="bg-body overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
    {{$posts->links()}}
        
    </div>
    </div>
</div>



























  </div>

</div>

  </div>
@endsection